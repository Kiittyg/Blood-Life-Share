<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lignedemande extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Donneur(){
        return $this->belongsTo(Donneur::class);
    }
    public function Demandedon(){
        return $this->belongsTo(Demandedon::class);
    }
}
