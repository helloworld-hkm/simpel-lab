<?php

namespace App\Http\Controllers;

use App\Models\penggantian_software;
use Illuminate\Http\Request;

class PenggantianSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        $sw = penggantian_software::with('software')->find($id);
        return response()->json([
            'software' => $sw,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penggantian_software $penggantian_software)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penggantian_software $penggantian_software)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penggantian_software $penggantian_software)
    {
        //
    }
}
