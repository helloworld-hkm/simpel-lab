<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Role;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('lab.index',[
            'title' => 'Lab Komputer',
            'active' => 'lab',
            'labs' => Lab::all(),
            "roles" => Role::whereNotIn('id', [1,2,3])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lab' => 'required|unique:lab,nama_lab',
            'role_id' => 'required',
        ],
        [
            'nama_lab.unique' => $request->nama_lab,
        ]
    );
        Lab::create( $validatedData);
        return redirect('/lab')->with('success',$request->input('nama_lab') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lab = Lab::with('role')->find($id);
        $roles = Role::get();
        return response()->json([
            'lab' => $lab,
            $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lab' => 'required',
            'role' => 'required',

        ]);
        $lab = lab::find($id);
        $isUnique=Lab::where('nama_lab', $request->nama_lab)->first();

        if ($isUnique&& $request->nama_lab!=$lab->nama_lab) {
            return redirect()->back()->with('nama_lab_sama',$isUnique->nama_lab);
        } else {
        $lab->nama_lab = $request->nama_lab;
        $lab->role_id = $request->role;

        $lab->save();
        session()->flash('update',   $lab->nama_lab);
        return redirect()->route('lab.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lab = Lab::find($id);
        $nama_lab= $lab->nama_lab;
        $lab->delete();
        return redirect()->route('lab.index')->with('delete',  $nama_lab);
    }
}
