<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lignerv extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Donneur(){
        return $this->belongsTo(Donneur::class);
    }
    public function Rendezvous (){
        return $this->belongsTo(Rendezvous::class);
    }
}
