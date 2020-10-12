<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Http\Requests\PostRequest;
use App\Http\Resources\ForumResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;
use App\Http\Resources\TopicResource;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //

    public function index(Forum $forum, Topic $topic)
    {
        return response()->json([
            'message' => "{$topic->title} posts",
            'topic' => new TopicResource($topic),
            'forum' => new ForumResource($forum),
            'data' => new PostResourceCollection(Post::whereTopicId($topic->id)->get())
        ], 200);
    }

    public function create(Forum $forum, Topic $topic, PostRequest $request)
    {
        $post = new Post();
        $post->fill($request->toArray());
        $post->topic_id = $topic->id;
        $post->user_id = Auth::user()->id;
        try {
            $post->save();
            return response()->json([
                'message' => 'Added Post Successfully',
                'data' => $post
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to create post',
                'data' => $ex
            ], 500);
        }
    }

    public function show(Forum $forum, Topic $topic, Post $post)
    {
        return response()->json([
            'data' => new PostResource($post)
        ], 200);
    }
}
