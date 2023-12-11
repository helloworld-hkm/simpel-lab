<?php

namespace App\Http\Controllers;

use App\Models\detail_perbaikan_komputer;
use App\Models\Hardware_Pc;
use App\Models\Komputer;
use App\Models\Lab;
use App\Models\Pemeliharaan_komputer;
use App\Models\Penggantian_Hardware;
use App\Models\penggantian_software;
use App\Models\Perbaikan;
use App\Models\Software_Pc;
use Illuminate\Http\Request;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->id == '4' || auth()->user()->role->id == '2') {
            $lab = Lab::with('komputer')->where('role_id', '4')->get();
            $lab_id = Lab::where('role_id', '4')->pluck('id')->toArray();
            $list_perbaikan = Perbaikan::with('lab')->with('pc')->whereIn('lab_id', $lab_id)->whereNot('status', 'selesai')->orderBy('id', 'desc')->get();
            $list_perbaikan_selesai = Perbaikan::with('lab')->with('pc')->whereIn('lab_id', $lab_id)->where('status', 'selesai')->orderBy('id', 'desc')->get();
        } else if (auth()->user()->role->id == '5' || auth()->user()->role->id == '3') {
            $lab = Lab::with('komputer')->where('role_id', '5')->get();
            $lab_id = Lab::where('role_id', '5')->pluck('id')->toArray();
            $list_perbaikan = Perbaikan::with('lab')->with('pc')->whereIn('lab_id', $lab_id)->whereNot('status', 'selesai')->orderBy('id', 'desc')->get();
            $list_perbaikan_selesai = Perbaikan::with('lab')->with('pc')->whereIn('lab_id', $lab_id)->where('status', 'selesai')->orderBy('tgl_kerusakan', 'desc')->get();
        }
        return view('perbaikan.index', [
            'title' => 'perbaikan',
            'active' => 'perbaikan',
            'lab' => $lab,
            'list_perbaikan' => $list_perbaikan,
            'list_perbaikan_selesai' => $list_perbaikan_selesai
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

        $data = [
            'pemeliharaan_id' => null,
            'pc_id' => $request->input('pc_id'),
            'lab_id' => $request->input('lab_id'),
            'kerusakan' => $request->input('kerusakan'),
            'tgl_kerusakan' => $request->input('tgl_kerusakan'),
            'tgl_selesai' => null,
        ];
        Perbaikan::create($data);
        // update status komnputer
        $komputer = Komputer::find($request->input('pc_id'));
        $komputer->status = 'Rusak';
        $komputer->save();
        return redirect('/perbaikan')->with('success', $komputer->no_pc);
    }

    /**
     * Display the specified resource.
     */
    public function show($lab_id)
    {
        $pcs = Komputer::where('lab_id', $lab_id)->orderBy('no_pc')->pluck('id', 'no_pc');

        return response()->json($pcs);
    }
    public function detail($id)
    {
        $perbaikan = Perbaikan::with('pc')->with('lab')->find($id);
        $daftar = detail_perbaikan_komputer::where('perbaikan_id', $id)->get();

        return view('perbaikan.detail', [
            'title' => 'Detail Perbaikan',
            'active' => 'perbaikan',
            'detail' => $perbaikan,
            'daftar_perbaikan' => $daftar

        ]);
    }
    public function getData($id){
        $perbaikan = Perbaikan::with('pc')->with('lab')->find($id);
        $daftar = detail_perbaikan_komputer::where('perbaikan_id', $id)->get();
        return response()->json([
            'perbaikan' => $perbaikan,
            'daftar' => $daftar,


        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perbaikan $perbaikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $perbaikan = Perbaikan::find($id);
        $perbaikan->status = $request->input('status');
        $perbaikan->save();

        if ($request->input('perbaikan', [])) {
            $perbaikanArray = $request->input('perbaikan', []);
            $jenisPerbaikanArray = $request->input('jenis_perbaikan', []);
            $idArray = $request->input('id', []);
            $penggantiArray = $request->input('pengganti', []);
            $count = count($perbaikanArray);
            for ($i = 0; $i < $count; $i++) {
                $daftarPerbaikan = $perbaikanArray[$i];
                $jenisPerbaikan = $jenisPerbaikanArray[$i];
                detail_perbaikan_komputer::create([
                    'perbaikan_id' => $id,
                    'jenis_perbaikan' => $jenisPerbaikan,
                    'perbaikan' => $daftarPerbaikan
                ]);

                // jenis perbaikan: penggantian hardware
                if ($jenisPerbaikan == "penggantian hardware") {

                    $hardware_lama = Hardware_Pc::where('pc_id', $perbaikan->pc_id)->where('hardware_id', $idArray[$i])->first();
                    Penggantian_Hardware::create([
                        'perbaikan_id' => $id,
                        'hardware_id' => $idArray[$i],
                        'pc_id' => $perbaikan->pc_id,
                        'hardware_baru' =>  $penggantiArray[$i],
                        'hardware_lama' => $hardware_lama->keterangan,
                        'tanggal_penggantian' => now(),
                    ]);

                    Hardware_Pc::where('pc_id', $perbaikan->pc_id)->where('hardware_id', $idArray[$i])->update(['keterangan' => $penggantiArray[$i]]);
                }
                // jenis perbaikan L instal software
                else if ($jenisPerbaikan == "instal software") {
                    $software_lama = Software_Pc::where('pc_id', $perbaikan->pc_id)->where('software_id', $idArray[$i])->first();
                    penggantian_software::create([
                        'perbaikan_id' => $id,
                        'software_id' => $idArray[$i],
                        'pc_id' => $perbaikan->pc_id,
                        'software_baru' =>  $penggantiArray[$i],
                        'software_lama' => $software_lama->keterangan,
                        'tanggal_penggantian' => now(),
                    ]);

                    Software_Pc::where('pc_id', $perbaikan->pc_id)->where('software_id', $idArray[$i])->update(['keterangan' => $penggantiArray[$i]]);
                }
            }
        }

        // jika statusnya selesai maka update status pc menjadi normal
        if ($request->input('status') == "selesai") {
            $pc = Komputer::find($perbaikan->pc_id);
            $pc->status = "Normal";
            $pc->save();
            $perbaikan->tgl_selesai = now();
            $perbaikan->save();
            return redirect('/perbaikan')->with('selesai', $pc->no_pc);
        } else {

            return redirect('/perbaikan/detail/' . $id)->with('update', 'perbaikan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perbaikan $perbaikan)
    {
        //
    }
}
