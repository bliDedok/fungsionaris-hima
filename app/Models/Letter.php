<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    public function letterType()
    {
        return $this->belongsTo(\App\Models\LetterType::class);
    }
}
