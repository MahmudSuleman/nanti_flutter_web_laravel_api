<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    public function client_type(): BelongsTo
    {
        return $this->belongsTo(ClientType::class);
    }


    protected $fillable = ['name', 'client_type_id', 'contact'];
}
