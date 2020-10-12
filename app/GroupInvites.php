<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupInvites extends Model
{
    //
    public $guarded = [];

    public $with = ['target'];

    public function group()
    {
        $this->belongsTo(Groups::class, 'group_id');
    }

    public function target()
    {
        return $this->hasOne(User::class, 'id', 'invitee');
    }
}
