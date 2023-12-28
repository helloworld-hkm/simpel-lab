<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pemeliharaan_komputer extends Model
{
    use HasFactory;
    protected $table='detail_pemeliharaan_komputer';
    protected $fillable = ['pemeliharaan_id', 'prosedur_id'];
    public $timestamps = false;
    public function perbaikan(){
        return $this->belongsTo(Perbaikan::class);
    }
}
