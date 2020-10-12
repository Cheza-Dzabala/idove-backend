<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function projects()
    {
        return $this->hasMany(Project::class, 'country', 'code');
    }

    public function project_count()
    {
        return $this->projects()->count();
    }
}
