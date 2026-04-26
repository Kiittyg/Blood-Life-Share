<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Stock(){
        return $this->hasMany(Stock::class);
    }
    public function Localite(){
        return $this->belongsTo(Localite::class);
    }
}
