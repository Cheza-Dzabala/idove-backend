<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Comments;

class Like extends Model
{
    //
    protected $guarded = [];

    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'likeable');
    }

    public function status_updates()
    {
        return $this->morphedByMany(StatusUpdate::class, 'likeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
