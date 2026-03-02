<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Registration extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'banner',
        'form_fields', 'open_date', 'close_date', 'is_active',
    ];

    protected $casts = [
        'form_fields' => 'array',
        'open_date' => 'date',
        'close_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function entries()
    {
        return $this->hasMany(RegistrationEntry::class);
    }

    public function isOpen(): bool
    {
        if (!$this->is_active)
            return false;
        $now = now()->toDateString();
        if ($this->open_date && $now < $this->open_date->toDateString())
            return false;
        if ($this->close_date && $now > $this->close_date->toDateString())
            return false;
        return true;
    }

    public function getBannerUrlAttribute()
    {
        return $this->banner ?Storage::url($this->banner) : null;
    }
}
