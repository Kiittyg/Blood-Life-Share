<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function donneurs()
    {
        return $this->belongsToMany(Donneur::class, 'donneur_notification');
    }

    public function responsables()
    {
        return $this->belongsToMany(Responsable::class, 'responsable_notification');
    }
}
