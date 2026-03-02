<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationEntry extends Model
{
    protected $fillable = ['registration_id', 'data'];

    protected $casts = [
        'data' => 'array',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
