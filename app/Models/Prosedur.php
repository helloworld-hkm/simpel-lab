<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prosedur extends Model
{
    use HasFactory;
    protected $table='prosedur_pemeliharaan';
    protected $guarded=['id'];
    public $timestamps = false;
}
