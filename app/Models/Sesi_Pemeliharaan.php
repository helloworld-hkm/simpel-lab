<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi_Pemeliharaan extends Model
{
    use HasFactory;
    protected $table='sesi_pemeliharaan';
    protected $guarded=['id'];
    public $timestamps = false;
    public function pemeliharaan(){
        return $this->hasMany(Pemeliharaan_komputer::class, 'sesi_id','id');
    }
    public function lab(){
        return $this->belongsTo(Lab::class,'lab_id');
    }
}
