<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Models\Lab;
use App\Models\Perbaikan;
use App\Models\Sesi_Pemeliharaan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        if(auth()->user()->role->id=='4'||auth()->user()->role->id=='2'){
            $lab= Lab::with('komputer')->where('role_id','4')->get();
            $lab_id= Lab::where('role_id','4')->pluck('id')->toArray();

         }
         else if(auth()->user()->role->id=='5'||auth()->user()->role->id=='3'){
            $lab= Lab::with('komputer')->where('role_id','5')->get();
            $lab_id= Lab::where('role_id','5')->pluck('id')->toArray();

        }
        else{
            $lab=Lab::all();
            $pc=[];
            $list_sesi=[];
            $list_perbaikan=[];
        }
        // selain admin
        if(!(auth()->user()->role->id=='1')){
        $pc=Komputer::whereIn('lab_id',$lab_id)->get();
        $hariIni = Carbon::now()->format('Y-m-d');
        $list_sesi=Sesi_Pemeliharaan::with('pemeliharaan')->whereIn('lab_id',$lab_id)->where('tanggal_mulai',$hariIni)->get();
         $list_perbaikan = Perbaikan::with('lab')->with('pc')->whereIn('lab_id', $lab_id)->whereNot('status', 'selesai')->orderBy('id', 'desc')->get();
        }
        return view('index',[
            "title"=>"Dashboard",
            "active"=>"dashboard",
            "users"=>count(User::all()),
            "labs"=>$lab,
            "komputer"=>count($pc),
            "sesi"=> $list_sesi,
            "list_perbaikan"=>$list_perbaikan
        ]);
    }
}
