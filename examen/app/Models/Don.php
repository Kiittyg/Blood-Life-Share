<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Donneur(){
        return $this->hasMany(donneur::class);
    }
    public function Centrehospitalier()
    {
        return $this->belongsTo(Centrehospitalier::class);
    }
}
