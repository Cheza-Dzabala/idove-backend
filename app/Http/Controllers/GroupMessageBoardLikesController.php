<?php

namespace App\Http\Controllers;

use App\GroupMessageBoard;
use App\Groups;
use App\Like;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupMessageBoardLikesController extends Controller
{
    //
    public function create(Groups $group, GroupMessageBoard $message, Request $request) {
        $like = new Like([
            'user_id' => Auth::user()->id
        ]);

        try {
            $message->likes()->save($like);
            if ($message->author_id !== Auth::user()->id) {
                $notification = new Notifications();
                $notification->user_id = $message->author_id;
                $notification->source = Auth::user()->id;
                $notification->message =  'liked your board post in  your group '.$group->name;
                $notification->type = 'like';
                $notification->entity = 'App\Like';
                $notification->save();
            }
            return response()->json([
                'message' => 'liked successfully',
                'data' => $message
            ], 200);

        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to like',
                'data' => $ex
            ], 500);
        }
    }


}
