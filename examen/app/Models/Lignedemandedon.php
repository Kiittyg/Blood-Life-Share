<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lignedemandedon extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Demandedon(){
        return $this->belongsTo(Demandedon::class);
    }
    public function Centrehospitalier(){
        return $this->belongsTo(Centrehospitalier::class);
    }
}
