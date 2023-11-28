<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        return view('index',[
            "title"=>"Dashboard",
            "active"=>"dashboard",
            "users"=>count(User::all()),
            "labs"=>count(Lab::all())
        ]);
    }
}
