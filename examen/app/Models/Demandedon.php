<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandedon extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public function donneurs()
    {
        return $this->belongsToMany(Donneur::class, 'lignedemande', 'demandedon_id', 'donneur_id')
                    ->withPivot('datedemande', 'heuredemande');
    }
    public function Centrehospitalier(){
        return $this->hasMany(centrehospitalier::class);
    }
    public function Groupesanguin(){
        return $this->belongsTo(Groupesanguin::class);
    }
    public function lignedemande()
{
    return $this->hasMany(Lignedemande::class);
}
public function lignedemandedon()
{
    return $this->hasMany(Lignedemandedon::class);
}
public function rendezvous()
{
    return $this->hasMany(Rendezvous::class);
}
}
