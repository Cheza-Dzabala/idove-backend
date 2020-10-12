<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Utilities\Utils;
use Carbon\Carbon;

class Post extends Model
{

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPublishedOnAttribute()
    {
        $published = new Carbon($this->created_at);
        return $published->diffForHumans();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable')->orderBy('id', 'desc');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($activity) {
            $slug = Str::slug($activity->title);
            $unique = false;
            $counter = 1;
            while ($unique === false) {
                $count = Utils::checkSlug(Post::class, $slug);
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
