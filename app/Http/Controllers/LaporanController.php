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
        else{
            $lab = Lab::with('komputer')->get();
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
        $pemeliharaan = Pemeliharaan_komputer::with('user')->with('pc')->whereIn('sesi_id', $list_sesi);
        $perbaikan = Perbaikan::with('detail')->with('pc')->with('lab')->where('lab_id', $lab);
        if ($komputer ) {
            if($komputer!='semua'){
                $pemeliharaan->where('pc_id', $komputer);
                $perbaikan->where('pc_id', $komputer);
            }
            else{
                // $pemeliharaan->order('pc_id');
                // $perbaikan->order('lab_id');
            }
        }
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
        $pemeliharaan = Pemeliharaan_komputer::with('user')->with('pc')->whereIn('sesi_id', $list_sesi)->where('pc_id', $pc);
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
        $resultPc=Komputer::find($pc);
        $resultLab=Lab::find($lab);

        $pdf = Pdf::loadview('laporan.cetak', [
            'pemeliharaan'=>$resultPemeliharaan,
            'perbaikan'=>$resultPerbaikan,
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir,
            'pc'=>$resultPc,
            'lab'=>$resultLab
        ]);
        $pdf->setPaper('A4', 'landscape');
        // // Render the HTML as PDF
        $pdf->render();
        // return $pdf->stream('Laporan', array("Attachment" => false));
        return $pdf->stream('Laporan Pemeliharaan dan perbaikan PC-'. $resultPc->no_pc.' Lab-'.$resultLab->nama_lab. '.pdf', array("Attachment" => false));
    }
    public function cetakLaporanLab(Request $request){
        $lab = $request->input('input_lab_id');
        $komputer = $request->input('input_pc_id');
        $startDate = $request->input('input_tgl_awal');
        $endDate = $request->input('input_tgl_akhir');
        $list_sesi = Sesi_Pemeliharaan::where('lab_id', $lab)->pluck('id')->toArray();
        $pemeliharaan = Pemeliharaan_komputer::with('user')->with('pc')->whereIn('sesi_id', $list_sesi);
        $perbaikan = Perbaikan::with('detail')->with('pc')->with('lab')->where('lab_id', $lab);
        if ($komputer ) {
            if($komputer!='semua'){
                $pemeliharaan->where('pc_id', $komputer);
                $perbaikan->where('pc_id', $komputer);
            }
            else{
                // $pemeliharaan->order('pc_id');
                // $perbaikan->order('lab_id');
            }
        }
        if ($startDate && $endDate) {
            $pemeliharaan->whereBetween('tanggal', [$startDate, $endDate]);
            $perbaikan->whereBetween('tgl_kerusakan', [$startDate, $endDate]);
        }
        $resultPemeliharaan = $pemeliharaan->get();
        $resultPerbaikan = $perbaikan->get();

        $resultLab=Lab::find($lab);

        $pdf = Pdf::loadview('laporan.cetak_lab', [
            'pemeliharaan'=>$resultPemeliharaan,
            'perbaikan'=>$resultPerbaikan,
            'tgl_awal'=>$startDate,
            'tgl_akhir'=>$endDate,
            'lab'=>$resultLab
        ]);
        $pdf->setPaper('A4', 'landscape');
        // // Render the HTML as PDF
        $pdf->render();
        // return $pdf->stream('Laporan', array("Attachment" => false));
        return $pdf->stream('Laporan Pemeliharaan dan perbaikan Lab-'.$resultLab. '.pdf', array("Attachment" => false));
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
