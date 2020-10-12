<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Likes;
use App\Notifications;
use App\StatusUpdates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    //
    public function create(StatusUpdates $update)
    {
        $like = new Likes();
        $like->user_id = Auth::user()->id;
        $like->update_id = $update->id;
        try {
            $like->save();

            $notification = new Notifications();
            $notification->user_id =  $like->status->author->id;
            $notification->source =  Auth::user()->id;
            $notification->message =  Auth::user()->username . ' liked your status';
            $notification->type =  'like';
            $notification->entity = 'App\Like';
            $notification->save();

            return response()->json([
                'message' => 'Successfully liked update',
            ], 201);
        } catch (\Exception $ex) {
            print($ex);
            return response()->json([
                'message' => 'Could not like update',
            ], 500);
        }
    }
}
