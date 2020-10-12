<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connections extends Model
{
    //
    protected $guarded = [];

    public function userOne()
    {
        return $this->hasOne(User::class, 'user_1');
    }

    public function userTwo()
    {
        return $this->hasOne(User::class, 'user_2');
    }

    public function blocker()
    {
        return $this->hasOne(User::class, 'is_blocked');
    }
}
