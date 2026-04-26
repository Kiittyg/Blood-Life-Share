<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lignedon extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Don(){
        return $this->belongsTo(Don::class);
    }
    public function Donneur(){
        return $this->belongsTo(Donneur::class);
    }
}
