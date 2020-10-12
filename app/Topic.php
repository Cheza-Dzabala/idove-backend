<?php

namespace App;

use App\Utilities\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Topic extends Model
{
    //

    protected $guarded = [];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'topic_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'creator', 'id');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($activity) {
            $slug = Str::slug($activity->title);
            $unique = false;
            $counter = 1;
            while ($unique === false) {
                $count = Utils::checkSlug(Topic::class, $slug);
                if (!$count) {
                    $unique = true;
                } else {
                    $slug = "{$slug}-{$counter}";
                }
                $counter = (int) $counter + 1;
            }
            $activity->slug = $slug;
        });
    }
}
