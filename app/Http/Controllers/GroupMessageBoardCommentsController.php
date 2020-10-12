<?php

namespace App\Http\Controllers;

use App\Comment;
use App\GroupMessageBoard;
use App\Groups;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupMessageBoardCommentsController extends Controller
{
    //
    public function create(Groups $group, GroupMessageBoard $message, Request $request) {
        $comment = new Comment([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id
        ]);

        try {
            $message->comments()->save($comment);
            if ($message->author_id !== Auth::user()->id) {
                $notification = new Notifications();
                $notification->user_id = $message->author_id;
                $notification->source = Auth::user()->id;
                $notification->message =  'Commented on your board post';
                $notification->type = 'comment';
                $notification->entity = 'App\Comments';
                $notification->save();
            }
            return response()->json([
                'message' => 'Commented successfully',
                'data' => $message
            ], 200);

        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to comment',
                'data' => $ex
            ], 500);
        }
    }
}
