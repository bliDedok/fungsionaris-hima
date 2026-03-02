<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['user_id', 'nim', 'name', 'email', 'phone', 'photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function periodRoles()
    {
        return $this->hasMany(MemberPeriodRole::class);
    }
    public function programMemberships()
    {
        return $this->hasMany(ProgramMember::class);
    }

    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        // Default avatar with initials
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=eab308&color=fff&bold=true';
    }
}
