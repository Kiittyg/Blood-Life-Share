<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function groupesanguins()
    {
        return $this->hasMany(Stockgs::class);
    }
    public function Centre(){
        return $this->belongsTo(Centre::class);
    }
    public function stockgs()
    {
        return $this->hasMany(Stockgs::class);
    }

}
