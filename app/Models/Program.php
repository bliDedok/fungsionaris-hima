<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Program extends Model
{
    protected $fillable = ['period_id', 'division_id', 'name', 'description', 'image', 'start_at', 'end_at'];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ?Storage::url($this->image)
            : 'https://via.placeholder.com/600x400?text=' . urlencode($this->name);
    }
}
