<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Forum;
use App\Http\Requests\CommentRequest;
use App\Like;
use App\Notifications;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //

    public function create(Forum $forum, Topic $topic, Post $post, CommentRequest $request)
    {
        $comment = new Comment([
            'comment' => $request->comment,
            'user_id' => Auth::user()->id
        ]);

        $notification = new Notifications();

        try {
            $post->comments()->save($comment);

            if ($post->user_id !== Auth::user()->id) {
                $notification = new Notifications();
                $notification->user_id = $post->user_id;
                $notification->source = Auth::user()->id;
                $notification->message =  Auth::user()->username . 'Commented on your post';
                $notification->type = 'comment';
                $notification->entity = 'App\Comments';
                $notification->save();
            }

            return response()->json([
                'message' => 'Successfully Saved Your Comment',
                'data' => $comment
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to save comment',
                'data' => $ex
            ], 500);
        }
    }

    public function like(Comment $comment)
    {
        $like = new Like(['user_id' => Auth::user()->id]);
        try {
            $comment->likes()->save($like);
            return response()->json([
                'message' => 'Successfully Liked Comment',
                'data' => $like
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to like comment',
                'data' => $ex
            ], 500);
        }
    }
}
