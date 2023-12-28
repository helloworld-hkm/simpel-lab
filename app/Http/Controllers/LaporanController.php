<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Models\Lab;
use App\Models\Pemeliharaan_komputer;
use App\Models\Perbaikan;
use App\Models\Sesi_Pemeliharaan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->id == '4' || auth()->user()->role->id == '2') {
            $lab = Lab::with('komputer')->where('role_id', '4')->get();
            $lab_id = Lab::where('role_id', '4')->pluck('id')->toArray();
        } else if (auth()->user()->role->id == '5' || auth()->user()->role->id == '3') {
            $lab = Lab::with('komputer')->where('role_id', '5')->get();
            $lab_id = Lab::where('role_id', '5')->pluck('id')->toArray();

        }
        $list_sesi = Sesi_Pemeliharaan::where('lab_id', '1')->pluck('id')->toArray();
        $pemeliharaan = Pemeliharaan_komputer::with('user')->where('pc_id','1')->whereIn('sesi_id',$list_sesi)->get();
        $list_perbaikan = Perbaikan::with('detail')->where('lab_id', '1')->where('pc_id','1')->get();
        return view('laporan.index',[
            'title'=>'Laporan',
            'active'=>'laporan',
            'lab' => $lab,
            'list_perbaikan' => $list_perbaikan,
            'pemeliharaan'=>$pemeliharaan,

        ]);
    }
    public function getData($labId){
        $pcs = Komputer::where('lab_id', $labId)->pluck('id', 'no_pc');

        return response()->json($pcs);
    }
    public function filterData(Request $request)
    {
        $lab = $request->input('lab');
        $komputer = $request->input('komputer');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $list_sesi = Sesi_Pemeliharaan::where('lab_id', $lab)->pluck('id')->toArray();
        $pemeliharaan = Pemeliharaan_komputer::with('user')->whereIn('sesi_id', $list_sesi)->where('pc_id', $komputer);
        $perbaikan = Perbaikan::with('detail')->where('lab_id', $lab)->where('pc_id',$komputer);
        if ($startDate && $endDate) {
            $pemeliharaan->whereBetween('tanggal', [$startDate, $endDate]);
            $perbaikan->whereBetween('tgl_kerusakan', [$startDate, $endDate]);
        }

        $resultPemeliharaan = $pemeliharaan->get();
        $resultPerbaikan = $perbaikan->get();

        if ($resultPemeliharaan->isEmpty() && $resultPerbaikan->isEmpty()) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json([
            'pemeliharaan'=>$resultPemeliharaan,
            'perbaikan'=>$resultPerbaikan
        ]);
    }
    public function cetakLaporan(Request $request){
        $lab=$request->input('input_lab_id');
        $pc=$request->input('input_pc_id');
        $tgl_awal=$request->input('input_tgl_awal');
        $tgl_akhir=$request->input('input_tgl_akhir');
        $list_sesi = Sesi_Pemeliharaan::where('lab_id', '1')->pluck('id')->toArray();
        $pemeliharaan = Pemeliharaan_komputer::with('user')->whereIn('sesi_id', $list_sesi)->where('pc_id', $pc);
        $perbaikan = Perbaikan::with('detail')->where('lab_id', $lab)->where('pc_id',$pc);
        if ($tgl_awal && $tgl_akhir) {
            $pemeliharaan->whereBetween('tanggal', [$tgl_awal, $tgl_akhir]);
            $perbaikan->whereBetween('tgl_kerusakan', [$tgl_awal, $tgl_akhir]);
        }
        else{
            $tgl_awal="";
            $tgl_akhir="";
        }
        $resultPemeliharaan = $pemeliharaan->get();
        $resultPerbaikan = $perbaikan->get();


        $pdf = Pdf::loadview('laporan.cetak', [
            'pemeliharaan'=>$resultPemeliharaan,
            'perbaikan'=>$resultPerbaikan,
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        ]);
        $pdf->setPaper('A4', 'landscape');
        // // Render the HTML as PDF
        $pdf->render();
        return $pdf->stream('Laporan', array("Attachment" => false));
        // return $pdf->stream('Hasil Pemeliharaan pc' . $pemeliharaan->pc->no_pc . '-' . $pemeliharaan->tanggal . '.pdf', array("Attachment" => false));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}