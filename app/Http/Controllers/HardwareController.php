<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use App\Models\Lab;
use Illuminate\Http\Request;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(auth()->user()->role->id=='4'){
            $lab= Lab::where('role_id','4')->with('hardware')->get();
         }
         else if(auth()->user()->role->id=='5'){
            $lab= Lab::where('role_id','5')->with('hardware')->get();
         }
        return view('hardware.index',[
            'title'=>'Hardware',
            'active'=>'hardware',
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
            'hardware' => 'required',
            'lab_id' => 'required',
        ],

    );
        Hardware::create( $validatedData);
        return redirect('/hardware')->with('success',$request->input('hardware') );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hardware = Hardware::where('lab_id', $id)->pluck('id','hardware');

        return response()->json($hardware);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hw = Hardware::find($id);
        return response()->json([
            'hardware' => $hw,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'hardware' => 'required',
            'lab_id' => 'required',

        ]);
        $hardware = Hardware::find($id);

        $hardware->hardware = $request->hardware;
        $hardware->lab_id = $request->lab_id;

        $hardware->save();
        session()->flash('update',   $hardware->hardware);
        return redirect()->route('hardware.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hardware = Hardware::find($id);
        $nama_hardware= $hardware->hardware;
        $hardware->delete();
        return redirect()->route('hardware.index')->with('delete',  $nama_hardware);
    }
}
