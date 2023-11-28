<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;
    protected $table='aset';
    protected $guarded=['id'];
    public $timestamps = false;
    public function lab(){
        return $this->belongsTo(Lab::class,'lab_id');
    }
}
