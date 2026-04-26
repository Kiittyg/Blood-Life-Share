<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockgs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Groupesanguin(){
        return $this->belongsTo(Groupesanguin::class);
    }
    public function Stock(){
        return $this->belongsTo(Stock::class);
    }
}
