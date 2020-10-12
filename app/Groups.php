<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //
    protected $guarded = [];

    protected $with = ['members'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function invites()
    {
        return $this->hasMany(GroupInvites::class, 'group_id');
    }

    public function members()
    {
        return $this->hasMany(GroupMembers::class, 'group_id');
    }

    public function getMemberCountAttribute()
    {
        return $this->members->count();
    }
}
