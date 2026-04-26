<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centrehospitalier extends Model
{
    use HasFactory;
    protected $guarded = [];

   /* public function Demandedon(){
        return $this->hasMany(Demandedon::class);
    }*/
    public function demandedons()
    {
        return $this->belongsToMany(Demandedon::class, 'lignedemandedon', 'centrehospitalier_id', 'demandedon_id')
                    ->withPivot('datedemande', 'heuredemande');
    }
    public function Localite(){
        return $this->belongsTo(Localite::class);
    }
    public function responsable(){
        return $this->hasMany(Responsable::class);
    }
    public function don(){
        return $this->hasMany(Don::class);
    }

}
