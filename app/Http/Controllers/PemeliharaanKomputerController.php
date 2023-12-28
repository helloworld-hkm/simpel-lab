<?php

namespace App\Http\Controllers;

use App\Models\detail_pemeliharaan_komputer;
use App\Models\Komputer;
use App\Models\Lab;
use App\Models\Pemeliharaan_komputer;
use App\Models\Perbaikan;
use App\Models\Prosedur;
use App\Models\Sesi_Pemeliharaan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;

use Illuminate\Http\Request;

class PemeliharaanKomputerController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->id == '4') {
            $lab = Lab::with('komputer')->where('role_id', '4')->get();
            $lab_id = Lab::where('role_id', '4')->pluck('id')->toArray();
            $list_sesi = Sesi_Pemeliharaan::with('pemeliharaan')->whereIn('lab_id', $lab_id)->get();
        } else if (auth()->user()->role->id == '5') {
            $lab = Lab::with('komputer')->where('role_id', '5')->get();
            $lab_id = Lab::where('role_id', '5')->pluck('id')->toArray();
            $list_sesi = Sesi_Pemeliharaan::with('pemeliharaan')->whereIn('lab_id', $lab_id)->get();
        }
        return view('pemeliharaan.index', [
            "title" => "Pemeliharaan Komputer",
            "active" => "pemeliharaan",
            "lab" => $lab,
            "sesi" => $list_sesi
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'tanggal_mulai' => 'required',
                'nama_sesi' => 'required',
                'lab_id' => 'required',
            ]
        );
        Sesi_Pemeliharaan::create($validatedData);
        return redirect('/pemeliharaan')->with('success', $request->input('nama_sesi'));
    }
    public function simpanPemeliharaan(Request $request)
    {
        $pemeliharaan = Pemeliharaan_komputer::create([
            'sesi_id' => $request->input('sesi_id'),
            'pc_id' => $request->input('pc_id'),
            'user_id' => $request->input('user_id'),
            'tanggal' => $request->input('tanggal'),
            'perbaikan' => $request->input('status'),
        ]);
        $pemeliharaanId = $pemeliharaan->id;
        foreach ($request->input('todo', []) as $todoId) {
            detail_pemeliharaan_komputer::create([
                'pemeliharaan_id' => $pemeliharaanId,
                'prosedur_id' => $todoId,
            ]);
        }
        if ($request->input('status') == 'Butuh Perbaikan') {
            $tanggalKerusakan = $request->input('tanggal');
            $data = [
                'pemeliharaan_id' => $pemeliharaanId,
                'pc_id' => $request->input('pc_id'),
                'lab_id' => $request->input('lab_id'),
                'kerusakan' => $request->input('kerusakan'),
                'tgl_kerusakan' => $tanggalKerusakan,
                'tgl_selesai' => null,
            ];
            Perbaikan::create($data);
            // update status komnputer
            $komputer = Komputer::find($request->input('pc_id'));
            $komputer->status = 'Rusak';
            $komputer->save();
        }

        return redirect('/pemeliharaan/sesi/' . $request->input('sesi_id') . '/' . $request->input('lab_id'))->with('success', $request->input('no_pc'));
    }
    public function getData($id)
    {
        $pemeliharaan = Pemeliharaan_komputer::with('pc')->with(['detail' => function ($query) use ($id) {
            $query->where('pemeliharaan_id', $id);
        }])->with('user')->find($id);
        $data_lab = Komputer::with('lab')->find($pemeliharaan->pc_id);

        return response()->json([
            'pemeliharaan' => $pemeliharaan,
            'lab' => $data_lab,


        ]);
    }
    public function cetakPemeliharaan($id)
    {
        $pemeliharaan = Pemeliharaan_komputer::with('pc')->with(['detail' => function ($query) use ($id) {
            $query->where('pemeliharaan_id', $id);
        }])->with('user')->find($id);
        $data_lab = Komputer::with('lab')->find($pemeliharaan->pc_id);
        $keterangan = "";
        if ($pemeliharaan->perbaikan == 'butuh perbaikan') {
            $keterangan = Perbaikan::where('pemeliharaan_id', $pemeliharaan->id)->get()->first();
        }
        // dd($pemeliharaan->pc->no_pc);
        $pdf = FacadePdf::loadview('pemeliharaan.laporan', [
            'pemeliharaan' => $pemeliharaan,
            'lab' => $data_lab,
            'kerusakan' => $keterangan
        ]);
        $pdf->setPaper('A4', 'portrait');
        // // Render the HTML as PDF
        $pdf->render();
        return $pdf->stream('Hasil Pemeliharaan pc' . $pemeliharaan->pc->no_pc . '-' . $pemeliharaan->tanggal . '.pdf', array("Attachment" => false));
    }
    public function komputer($id, $lab_id)
    {
        $list_sesi = Sesi_Pemeliharaan::with('pemeliharaan')->where('id', $id)->where('lab_id', $lab_id)->first();
        $data_lab = Lab::find($lab_id);
        $data_prosedur = Prosedur::all();
        $pcId = Pemeliharaan_komputer::where('sesi_id', $id)->pluck('pc_id')->toArray();
        $data_komputer_belum_dicek = Komputer::where('lab_id', $lab_id)->orderBy('no_pc')->with(['pemeliharaan' => function ($query) use ($id) {
            $query->where('sesi_id', $id);
        }])->whereNotIn('id', $pcId)->get();
        $data_komputer_dicek = Komputer::where('lab_id', $lab_id)->orderBy('no_pc')->with(['pemeliharaan' => function ($query) use ($id) {
            $query->where('sesi_id', $id);
        }])->whereIn('id', $pcId)->get();

        return view('pemeliharaan.komputer', [
            "title" => "Pemeliharaan Komputer",
            "active" => "pemeliharaan",
            "data" => $data_komputer_belum_dicek,
            "data_pemeliharaan" => $data_komputer_dicek,
            "lab" => $data_lab,
            "sesi" => $list_sesi,
            "prosedur" => $data_prosedur,

        ]);
    }
}
