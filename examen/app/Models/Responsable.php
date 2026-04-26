<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Responsable extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    
    protected $hidden = [
        'motdepasse', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->motdepasse;
    }
   
    public function centrehospitalier(){
        return $this->hasMany(centrehospitalier::class);
    }
    public function notifications()
{
    return $this->belongsToMany(Notification::class, 'responsable_notification');
}
}
