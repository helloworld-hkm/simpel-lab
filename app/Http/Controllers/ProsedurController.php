<?php

namespace App\Http\Controllers;

use App\Models\Prosedur;
use Illuminate\Http\Request;

class ProsedurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view ('prosedur.index',[
            'title'=>'Prosedur Pemeliharaan',
            'active'=>'prosedur',
            'data'=>Prosedur::all()
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
            'keterangan' => 'required',
        ],

    );
        Prosedur::create( $validatedData);
        return redirect('/prosedur')->with('success',$request->input('software') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Prosedur $prosedur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prosedur $prosedur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',

        ]);
        $prosedur = Prosedur::find($id);

        $prosedur->keterangan = $request->keterangan;
        $prosedur->save();
        session()->flash('update',   $prosedur->keterangan);
        return redirect()->route('prosedur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prosedur = Prosedur::find($id);
        $keterangan= $prosedur->keterangan;
        $prosedur->delete();
        return redirect()->route('prosedur.index')->with('delete',  $keterangan);
    }
}
