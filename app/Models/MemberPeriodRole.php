<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPeriodRole extends Model
{
    protected $fillable = [
        'period_id', 'member_id', 'division_id', 'position_id',
        'is_core', 'is_active', 'joined_at',
    ];

    protected $casts = [
        'is_core' => 'boolean',
        'is_active' => 'boolean',
        'joined_at' => 'date',
    ];

    public function position()
    {
        return $this->belongsTo(\App\Models\Position::class);
    }

    public function member()
    {
        return $this->belongsTo(\App\Models\Member::class);
    }

    public function division()
    {
        return $this->belongsTo(\App\Models\Division::class);
    }

    public function period()
    {
        return $this->belongsTo(\App\Models\Period::class);
    }
}
