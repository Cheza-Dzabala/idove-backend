<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentOnStatusUpdateRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Notifications;
use App\StatusUpdate;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusUpdatesController extends Controller
{
    //
    public function index()
    {
        $updates = StatusUpdate::get();
        return response()->json([
            'message' => 'Successfully retrieved',
            'data' => $updates
        ], 200);
    }

    public function comment(StatusUpdate $update, CommentOnStatusUpdateRequest $request)
    {
        $comment = new Comment([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id
        ]);

        try {
            $update->comments()->save($comment);
            if ($update->user_id !== Auth::user()->id) {
                $notification = new Notifications();
                $notification->user_id = $update->user_id;
                $notification->source = Auth::user()->id;
                $notification->message =  'Commented on your update';
                $notification->type = 'comment';
                $notification->entity = 'App\Comments';
                $notification->save();
            }
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to comment',
                'data' => $ex
            ], 500);
        }
    }

    public function store(StatusUpdateRequest $request)
    {
        $update = new StatusUpdate();
        $update->user_id = Auth::user()->id;
        $update->fill($request->toArray());
        try {
            $update->save();
            return response()->json([
                'message' => 'Successfully posted update',
                'data' => $update
            ], 201);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Something went wrong',
                'data' => $ex->message
            ], 500);
        }
    }
}
