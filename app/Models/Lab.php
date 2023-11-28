<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    protected $table='lab';
    protected $guarded=['id'];
    public $timestamps = false;
    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
    public function hardware(){
        return $this->hasMany(Hardware::class,'lab_id','id' );
    }
    public function software(){
        return $this->hasMany(Software::class,'lab_id','id' );
    }
    public function aset(){
        return $this->hasMany(Aset::class,'lab_id','id' );
    }
    public function komputer(){
        return $this->hasMany(Komputer::class,'lab_id','id' );
    }
    public function sesi(){
        return $this->hasMany(Sesi_Pemeliharaan::class,'lab_id','id' );
    }
}
