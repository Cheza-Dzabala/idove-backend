<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusUpdate extends Model
{
    //
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable')->orderBy('id', 'desc');
    }

    public function likes()
    {
        return $this->morphToMany(Like::class, 'likeable')->orderBy('id', 'desc');
    }
}
