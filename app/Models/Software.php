<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    protected $table='software';
    protected $guarded=['id'];
    public $timestamps = false;
    public function lab(){
        return $this->belongsTo(Lab::class,'lab_id');
    }
    public function pcs()
    {
        return $this->belongsToMany(Komputer::class, 'software_pc', 'pc_id', 'software_id')->withPivot('keterangan');
    }
}
