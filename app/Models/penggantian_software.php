<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penggantian_software extends Model
{
    use HasFactory;
    protected $table='penggantian_software';
    protected $guarded=['id'];
    public $timestamps = false;
    public function software(){
        return $this->belongsTo(Software::class,'software_id');
    }
}
