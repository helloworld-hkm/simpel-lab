<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Pemeliharaan_komputer;
use App\Models\Perbaikan;
use Illuminate\Http\Request;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role->id=='4'||auth()->user()->role->id=='2'){
            // $lab= Lab::with('komputer')->where('role_id','4')->get();
            $lab_id= Lab::where('role_id','4')->pluck('id')->toArray();
            $list_perbaikan=Perbaikan::with('lab')->with('pc')->whereIn('lab_id',$lab_id)->get();
         }
         else if(auth()->user()->role->id=='5'||auth()->user()->role->id=='3'){
            // $lab= Lab::with('komputer')->where('role_id','5')->get();
            $lab_id= Lab::where('role_id','5')->pluck('id')->toArray();
            $list_perbaikan=Perbaikan::with('lab')->with('pc')->whereIn('lab_id',$lab_id)->get();

         }
        return view('perbaikan.index',[
            'title'=>'perbaikan',
            'active'=>'perbaikan',
            'list_perbaikan'=>$list_perbaikan
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
    public function show(Perbaikan $perbaikan)
    {
        //
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
    public function update(Request $request, Perbaikan $perbaikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perbaikan $perbaikan)
    {
        //
    }
}
