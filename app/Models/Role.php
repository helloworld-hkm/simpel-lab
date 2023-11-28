<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $guarded=['id'];
    // protetected
    public $timestamps = false;
    public function user(){

        return $this->hasMany(User::class);

    }
    public function lab(){

        return $this->hasMany(Lab::class);

    }
}
