<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $kepalaTKJT=User::userExistsWithRole(2);

        return view('pengguna.index', [
            "title" => "Manajemen Pengguna",
            "active" => "pengguna",
            "users" => User::all(),
            "roles" => Role::where('role', '!=', 'admin')->get(),
            "kepalaTKJT"=>$kepalaTKJT,
            "kepalaAKL"=>User::userExistsWithRole(3)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    return $request->all();
        $validatedData = $request->validate([
            'fullname' => 'required',
            'username' => ['required', 'unique:users'],
            'role_id' => 'required',
            'jurusan' => 'nullable',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|max:16'
        ],
        [
            'username.unique'=> $request->username
        ]
    );

        User::create($validatedData);
        return redirect('/pengguna')->with('success', $request->input('username'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return view('pengguna.detail',[
            'title' => 'Detail Pengguna',
            'active' => 'pengguna',
            'detail' => User::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::find($id);
        // $student->find($id);
        $roles = Role::get();
        return response()->json([
            'users' => $users,
            $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role' => 'required',

        ]);
        $user = User::find($id);
        $user->role_id = $request->role;

        $user->save();

        session()->flash('update',   $user->username);
        return redirect()->route('pengguna.index');
        //    return $id;
    }
    public function updateDataUser(Request $request, $id)
    {
        $user = User::find($id);
        $isUnique=User::where('username', $request->username)->first();

        if ($isUnique&& $request->username!=$user->username) {
            return redirect()->back()->with('username_sama',$isUnique->username);
        } else {
            $user->username = $request->username;
            $user->fullname = $request->fullname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();


            session()->flash('update',   $user->username);
            return redirect()->route('pengguna.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $username= $user->username;
        $user->delete();
        return redirect()->route('pengguna.index')->with('delete',  $username);
    }
}
