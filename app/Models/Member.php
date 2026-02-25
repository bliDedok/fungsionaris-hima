<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function user(){ return $this->belongsTo(User::class); }
    public function periodRoles(){ return $this->hasMany(MemberPeriodRole::class); }
    public function programMemberships(){ return $this->hasMany(ProgramMember::class); }
}
