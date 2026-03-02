<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = ['program_id', 'category', 'title', 'image', 'caption'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ?Storage::url($this->image) : null;
    }
}
