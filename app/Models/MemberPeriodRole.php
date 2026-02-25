<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPeriodRole extends Model
{
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
