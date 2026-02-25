<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function memberPeriodRoles()
    {
        return $this->hasMany(\App\Models\MemberPeriodRole::class);
    }
}
