<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function donneur()
    {
        return $this->hasMany(donneur::class);
    }
    public function demandedon()
    {
        return $this->belongsTo(demandedon::class);
    }
}
