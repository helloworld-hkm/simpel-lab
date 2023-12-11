<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Lab;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->id == '4' || auth()->user()->role->id == '2') {
            $lab = Lab::where('role_id', '4')->with('aset')->get();
        } else if (auth()->user()->role->id == '5' || auth()->user()->role->id == '3') {
            $lab = Lab::where('role_id', '5')->with('aset')->get();
        }
        return view('aset.index',[
            'title'=>'Aset',
            'active'=>'aset',
            'data'=>$lab
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
        $validatedData = $request->validate([
            'aset' => 'required',
            'lab_id' => 'required',
            'kondisi' => 'required',
        ],

    );
        Aset::create( $validatedData);
        return redirect('/aset')->with('success',$request->input('aset') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'aset' => 'required',
            'lab_id' => 'required',
            'kondisi' => 'required',

        ]);
        $aset = aset::find($id);

        $aset->aset = $request->aset;
        $aset->lab_id = $request->lab_id;
        $aset->kondisi = $request->kondisi;

        $aset->save();
        session()->flash('update',   $aset->aset);
        return redirect()->route('aset.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aset = aset::find($id);
        $nama_aset= $aset->aset;
        $aset->delete();
        return redirect()->route('aset.index')->with('delete',  $nama_aset);
    }
}
