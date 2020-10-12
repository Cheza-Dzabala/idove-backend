<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array'
    ];

    public function category()
    {
        return $this->hasOne(ProjectCategory::class, 'id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getProjectStartDateAttribute() {
        $date = new Carbon($this->start_date);
        return $date->isoFormat('MMMM Do YYYY');
    }

    public function country_source()
    {
        return $this->belongsTo(Country::class, 'country', 'code');
    }
}
