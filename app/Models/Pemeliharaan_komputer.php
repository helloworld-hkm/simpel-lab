<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan_komputer extends Model
{
    use HasFactory;
    protected $table='pemeliharaan_komputer';
    protected $guarded=['id'];
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function pc(){
        return $this->belongsTo(Komputer::class,'pc_id');
    }
    public function sesi(){
        return $this->belongsTo(Sesi_Pemeliharaan::class,'sesi_id');
    }
    public function detail()
    {
        return $this->belongsToMany(Prosedur::class, 'detail_pemeliharaan_komputer', 'pemeliharaan_id', 'prosedur_id');
    }
    public function perbaikan(){
        return $this->hasMany(Perbaikan::class,'pemeliharaan_id','id' );
    }
}
