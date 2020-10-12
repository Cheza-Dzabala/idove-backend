<?php

namespace App;

use App\Events\NotificationEvent;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $guarded = [];

    protected $with = [
        '_target', '_source.profile'
    ];

    public function _target()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function _source()
    {
        return $this->belongsTo(User::class, 'source');
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function ($notification) {
            event(new NotificationEvent(
                $notification->message,
                $notification->type,
                $notification->_target,
                $notification->_source,
                $notification->entity,
                $notification->created_at,
            ));
        });
    }
}
