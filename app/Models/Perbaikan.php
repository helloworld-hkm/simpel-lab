<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;
    protected $table='perbaikan';
    protected $guarded=['id'];
    public $timestamps = false;
    protected $attributes = [
        'tgl_selesai' => null,
    ];
    public function pemeliharaan(){
        return $this->belongsTo(Pemeliharaan_komputer::class,'pemeliharaan_id');
    }
    public function pc(){
        return $this->belongsTo(Komputer::class,'pc_id');
    }
    public function lab(){
        return $this->belongsTo(Lab::class,'lab_id');
    }
}
