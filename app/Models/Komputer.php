<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    use HasFactory;
    protected $table='pc';
    protected $guarded=['id'];
    public $timestamps = false;
    public function lab(){
        return $this->belongsTo(Lab::class);
    }

    public function hardwares()
    {
        return $this->belongsToMany(Hardware::class, 'hardware_pc', 'pc_id', 'hardware_id')->withPivot('keterangan');
    }
    public function softwares()
    {
        return $this->belongsToMany(Software::class, 'software_pc', 'pc_id', 'software_id')->withPivot('keterangan');
    }
    public function prosedur()
    {
        return $this->belongsToMany(Prosedur::class, 'detail_pemeliharaan_komputer', 'prosedur_id', 'pemeliharaan_id');
    }
    public function pemeliharaan(){
        return $this->hasMany(Pemeliharaan_komputer::class,'pc_id','id');
    }
    public function perbaikan(){
        return $this->hasMany(Perbaikan::class,'pc_id','id');
    }
}
