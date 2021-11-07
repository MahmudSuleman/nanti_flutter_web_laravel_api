<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;


    public function device()
    {
        return $this->belongsTo('App\Models\Device');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
}