<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMessageBoard extends Model
{
    //
    protected $guarded = [];

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function likes()
    {
        return $this->morphToMany(Like::class, 'likeable')->orderBy('id', 'desc');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable')->orderBy('id', 'desc');
    }
}
