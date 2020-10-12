<?php

namespace App;

use App\Utilities\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Forum extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'forum_id', 'id');
    }

    public function getTopicCountAttribute()
    {
        return $this->topics()->count();
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($activity) {
            $slug = Str::slug($activity->title);
            $unique = false;
            $counter = 1;
            while ($unique === false) {
                $count = Utils::checkSlug(Forum::class, $slug);
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
