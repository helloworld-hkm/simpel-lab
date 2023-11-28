<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software_Pc extends Model
{
    use HasFactory;
    protected $table='software_pc';
    protected $fillable = ['software_id', 'pc_id','keterangan'];
    public $timestamps = false;
}
