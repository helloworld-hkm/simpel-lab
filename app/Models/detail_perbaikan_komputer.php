<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_perbaikan_komputer extends Model
{
    use HasFactory;
    protected $table='detail_perbaikan';
    protected $fillable = ['perbaikan_id', 'jenis_perbaikan','perbaikan'];
    public $timestamps = false;
}
