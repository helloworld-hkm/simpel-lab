<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(auth()->user()->role->id=='4'){
            $lab= Lab::where('role_id','4')->with('Software')->get();
         }
         else if(auth()->user()->role->id=='5'){
            $lab= Lab::where('role_id','5')->with('Software')->get();
         }
        return view('Software.index',[
            'title'=>'Software',
            'active'=>'software',
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
            'software' => 'required',
            'lab_id' => 'required',
        ],

    );
        Software::create( $validatedData);
        return redirect('/software')->with('success',$request->input('software') );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $software = Software::where('lab_id', $id)->pluck('id','software');

        return response()->json($software);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sw = software::find($id);
        return response()->json([
            'software' => $sw,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'software' => 'required',
            'lab_id' => 'required',

        ]);
        $software = software::find($id);

        $software->software = $request->software;
        $software->lab_id = $request->lab_id;

        $software->save();
        session()->flash('update',   $software->software);
        return redirect()->route('software.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $software = Software::find($id);
        $nama_software= $software->software;
        $software->delete();
        return redirect()->route('software.index')->with('delete',  $nama_software);
    }
}
