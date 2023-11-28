<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengguna.profile',[
            'title'=>'Profil pengguna',
            'active'=>'Profil ',
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $user= User::find($id);
        $isUnique=User::where('username', $request->username)->first();
        if ($isUnique && $request->username!=$user->username) {
            return redirect()->back()->with('gagal',$isUnique->username);
        } else {
        $user->username=$request->username;
        $user->fullname=$request->fullname;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->save();
        session()->flash('success', 'Perubahan data berhasil disimpan di dalam sistem');
        return redirect()->route('profile.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function updatePassword(Request $request, $id){
        // return $request->all();
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);


        $user = User::find($id);

        if (!Hash::check($request->current_password, $user->password)) {
            session()->flash('error', 'Pastikan password lama Anda benar ');
            return redirect()->back();
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.index')->with('success', 'Password Anda berhasil diperbarui. Sekarang Anda dapat masuk dengan password baru Anda');
    }
}
