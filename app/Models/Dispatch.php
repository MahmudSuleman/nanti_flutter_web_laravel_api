<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dispatch extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = ['client_id', 'device_id', 'date', 'note'];

    public function device()
    {
        return $this->belongsTo('App\Models\Device');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }


}