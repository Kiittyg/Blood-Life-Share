<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Responsable(){
        return $this->belongsTo(Responsable::class);
    }
    public function Centrehospitalier(){
        return $this->belongsTo(Centrehospitalier::class);
    }
}
