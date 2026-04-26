<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupesanguin extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Donneur(){
        return $this->hasMany(Donneur::class);
    }
 public function Stock(){
        return $this->hasMany(Stock::class);
    }
    public function Demandedon(){
        return $this->hasMany(Demandedon::class);
    }
    public function stockgs()
    {
        return $this->hasMany(Stockgs::class);
    }
}
