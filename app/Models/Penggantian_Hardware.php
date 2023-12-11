<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggantian_Hardware extends Model
{
    protected $table='penggantian_hardware';
    protected $guarded=['id'];
    public $timestamps = false;
    public function hardware(){
        return $this->belongsTo(Hardware::class,'hardware_id');
    }
}
