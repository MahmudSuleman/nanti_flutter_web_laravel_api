<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    use HasFactory;

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }


    protected $fillable = ['name', 'manufacturer_id', 'model', 'serial_number'];
}
