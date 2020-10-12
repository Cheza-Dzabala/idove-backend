<?php

namespace App;

use App\Events\ConnectionRequestEvent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ConnectionRequests extends Model
{
    //
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::saved(function ($request) {
            $date = new Carbon($request->created_at);
            $sent_on =  $date->diffForHumans();
            event(new ConnectionRequestEvent(
                Auth::user(),
                User::whereId($request->requested)->first(),
                'pending',
                $sent_on
            ));
        });
    }


    public function sent_by()
    {
        return $this->belongsTo(User::class,  'requestor', 'id');
    }

    public function sent_to()
    {
        return $this->belongsTo(User::class,  'requested', 'id');
    }
}
