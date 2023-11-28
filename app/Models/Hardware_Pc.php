<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware_Pc extends Model
{
    use HasFactory;
    protected $table='hardware_pc';
    protected $fillable = ['hardware_id', 'pc_id','keterangan'];
    public $timestamps = false;
}
