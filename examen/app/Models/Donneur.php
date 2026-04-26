<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Donneur extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'motdepasse', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function demandedons()
    {
        return $this->belongsToMany(Demandedon::class, 'lignedemande', 'donneur_id', 'demandedon_id')
                    ->withPivot('datedemande', 'heuredemande');
    }
    public function Rendezvous(){
        return $this->hasMany(Rendezvous::class);
    }
    public function Don(){
        return $this->hasMany(Don::class);
    }
    public function Localite(){
        return $this->belongsTo(Localite::class);
    }
    public function Groupesanguin(){
        return $this->belongsTo(Groupesanguin::class);
    }

    public function getAuthPassword()
    {
        return $this->motdepasse;
    }
    public function notifications()
{
    return $this->belongsToMany(Notification::class,'donneur_notification');
}
}

