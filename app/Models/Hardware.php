<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;
    protected $table='hardware';
    protected $guarded=['id'];
    public $timestamps = false;
    public function lab(){
        return $this->belongsTo(Lab::class,'lab_id');
    }
    public function pcs()
    {
        return $this->belongsToMany(Komputer::class, 'hardware_pc', 'pc_id', 'hardware_id')->withPivot('keterangan');
    }
}
