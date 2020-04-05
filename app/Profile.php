<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    // protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function work_and_education()
    {
        return $this->hasMany(WorkAndEducations::class);
    }
}
