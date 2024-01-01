<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Hardware;
use App\Models\Komputer;
use App\Models\Lab;
use App\Models\Pemeliharaan_komputer;
use App\Models\Penggantian_Hardware;
use App\Models\penggantian_software;
use App\Models\Perbaikan;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( auth()->user()->role->id == '2') {
            $lab = Lab::where('role_id', '4')->with('komputer')->get();
        } else if (auth()->user()->role->id == '3') {
            $lab = Lab::where('role_id', '5')->with('komputer')->get();
        }
         else if (auth()->user()->role->id == '1') {
            $lab = Lab::with('komputer')->get();
        }

        return view('monitoring.laboratorium',[
            'title'=>'monitoring',
            'active'=>'monitoring',
            'data' => $lab
        ]);
    }
    public function shortByLab($id)
    {
        $hardware = Hardware::where('lab_id', $id)->get();
        $software = Software::where('lab_id', $id)->get();

        $lab = Lab::find($id);
        // $data = Komputer::where('lab_id', $id)->with('lab')->get();
        $data = Komputer::where('lab_id', $id)->orderBy('no_pc')->with(['pemeliharaan' => function ($query) {
            $query->latest('tanggal');
        }])->get();
        $dataAsset = Aset::where('lab_id',$id)->get();
        return view('monitoring.komputer', [
            'title' => 'Komputer',
            'active' => 'komputer',
            'data' => $data,
            'dataAsset' => $dataAsset,
            'lab' => $lab,
            'list' => $hardware,
            'software' => $software
        ]);
    }
    public function detail($id, $lab)
    {
        $data = Komputer::where('id', $id)->with('lab')->first();
        $pc = Komputer::where('id', $id)->first();

        $pemeliharaan=Pemeliharaan_komputer::where('pc_id',$id)->orderBy('tanggal')->get();
        $perbaikan=Perbaikan::where('pc_id',$id)->orderBy('tgl_kerusakan')->get();
        $penggantian_hardware=Penggantian_Hardware::with('hardware')->where('pc_id',$id)->get();
        $penggantian_software=penggantian_software::with('software')->where('pc_id',$id)->get();

        $hwId = DB::table('hardware_pc')->where('pc_id',$id)->pluck('hardware_id')->toArray();
        $unlinkHardware = Hardware::where('lab_id', $lab)->whereNotIn('id', $hwId)->get();

        $swId = DB::table('software_pc')->where('pc_id',$id)->pluck('software_id')->toArray();
        $unlinkSoftware = Software::where('lab_id', $lab)->whereNotIn('id', $swId)->get();


        return view('monitoring.detail', [
            'title' => 'Komputer',
            'active' => 'komputer',
            'data' => $data,
            'data_pc' => $pc,
            'unlink_hw' => $unlinkHardware,
            'daftar_pemeliharaan'=>$pemeliharaan,
            'daftar_perbaikan'=>$perbaikan,
            'daftar_penggantian_hardware'=>$penggantian_hardware,
            'daftar_penggantian_software'=>$penggantian_software,
            'unlink_sw' => $unlinkSoftware,
        ]);
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
    public function show(Komputer $komputer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komputer $komputer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komputer $komputer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komputer $komputer)
    {
        //
    }
}
