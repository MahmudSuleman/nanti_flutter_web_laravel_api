<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class DispatchNote extends Model
{
    use HasFactory;

    
    protected $fillable = ['client_id', 'note', 'note_date'];

    public function client()
    {
        return $this->belongsTo(Client::class)->with('client_type');
    }
}