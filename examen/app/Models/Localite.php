<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Donneur(){
        return $this->hasMany(Donneur::class);
    }
    public function Centrehospitalier(){
        return $this->hasMany(Centrehospitalier::class);
    }
    public function Centre(){
        return $this->hasMany(Centre::class);
    }
}
