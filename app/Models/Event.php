<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'open_from' => 'datetime',
        'open_until' => 'datetime',
    ];

    protected $fillable = [
    'period_id','type','program_id','title','start_at','end_at','only_core',
    'attendance_mode','qr_token','open_from','open_until','location','created_by'
    ];

    public function attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class);
    }

    public function participants()
    {
        return $this->hasMany(\App\Models\EventParticipant::class);
    }
}
