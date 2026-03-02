<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name', 'sort_order'];

    public function memberPeriodRoles()
    {
        return $this->hasMany(\App\Models\MemberPeriodRole::class);
    }
}
