<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded = [];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'commentable');
    }

    public function status_updates()
    {
        return $this->morphedByMany(StatusUpdate::class, 'commentable');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->morphToMany(Like::class, 'likeable');
    }
}
