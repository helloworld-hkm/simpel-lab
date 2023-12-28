<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use App\Models\Hardware_Pc;
use App\Models\Komputer;
use App\Models\Lab;
use App\Models\Pemeliharaan_komputer;
use App\Models\Penggantian_Hardware;
use App\Models\penggantian_software;
use App\Models\Perbaikan;
use App\Models\Software;
use App\Models\Software_Pc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->id == '4') {
            $lab = Lab::where('role_id', '4')->with('komputer')->get();
        } else if (auth()->user()->role->id == '5') {
            $lab = Lab::where('role_id', '5')->with('komputer')->get();
        }

        return view('komputer.index', [
            'title' => 'Komputer',
            'active' => 'komputer',
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
        return view('komputer.komputer', [
            'title' => 'Komputer',
            'active' => 'komputer',
            'data' => $data,
            'lab' => $lab,
            'list' => $hardware,
            'software' => $software
        ]);
    }

    public function getData($no_pc,$lab_id){
        $pc = Komputer::where('no_pc',$no_pc)->where('lab_id',$lab_id)->get();

        return response()->json([
            'data' => $pc,

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


        return view('komputer.detail', [
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

    public function simpan(Request $request)
    {
        //
        $validatedData = $request->validate(
            [
                'no_pc' => 'required',
                'lab_id' => 'required',

            ],


        );
        $id_lab = $request->input('lab_id');
        $cek_noPc = Komputer::where('lab_id', $request->input('lab_id'))->where('no_pc', $request->input('no_pc'))->first();

        if ($cek_noPc) {
            return redirect()->back()->with('nomor_pc_sama', $cek_noPc->no_pc);
        }
        $komputer = Komputer::create($validatedData);
        $lastInsertedId = $komputer->id;
        // simpan list hardware
        foreach ($request->input('hardware') as $masterHardwareId => $hardware) {

            Hardware_Pc::create([
                'hardware_id' => $masterHardwareId,
                'keterangan' => $hardware['keterangan'],
                'pc_id' => $lastInsertedId,

            ]);
        }
        // simpan daftar software
        foreach ($request->input('software') as $softwareId => $software) {
            Software_Pc::create([
                'software_id' => $softwareId,
                'keterangan' => $software['keterangan'],
                'pc_id' => $lastInsertedId,

            ]);
        }
        return redirect('/komputer/lab/' . $id_lab)->with('success', $request->input('no_pc'));
    }

    public function updatehardware(Request $request, $id, $lab_id)
    {
        $pc_id = $id;
        $no_pc = Komputer::find($id);

        foreach ($request->input('hardware') as $masterHardwareId => $hardware) {

            Hardware_Pc::create([
                'hardware_id' => $masterHardwareId,
                'keterangan' => $hardware['keterangan'],
                'pc_id' => $pc_id,

            ]);
        }
        return redirect('/komputer/detail/' . $id . '/' . $lab_id)->with('update_spek', $no_pc->no_pc);
    }
    public function updatesoftware(Request $request, $id, $lab_id)
    {
        $pc_id = $id;
        $no_pc = Komputer::find($id);
        foreach ($request->input('software') as $softwareId => $software) {
            Software_Pc::create([
                'software_id' => $softwareId,
                'keterangan' => $software['keterangan'],
                'pc_id' => $pc_id,

            ]);
        }
        return redirect('/komputer/detail/' . $id . '/' . $lab_id)->with('update_spek', $no_pc->no_pc);
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
    public function edit($id)
    {
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
