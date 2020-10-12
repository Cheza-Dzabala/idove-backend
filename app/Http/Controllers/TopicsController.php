<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Http\Requests\TopicRequest;
use App\Http\Resources\ForumResource;
use App\Http\Resources\TopicResourceCollection;
use App\Topic;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    public function index(Forum $forum)
    {
        return response()->json([
            'message' => 'Topic',
            'forum' => new ForumResource($forum),
            'data' => new TopicResourceCollection(Topic::whereForumId($forum->id)->orderBy('id', 'desc')->get())
        ], 200);
    }

    public function create(Forum $forum, TopicRequest $request)
    {
        $topic = new Topic();
        $topic->fill($request->toArray());
        $topic->creator = Auth::user()->id;
        $topic->forum_id = $forum->id;
        try {
            $topic->save();
            return response()->json([
                'message' => 'Added Topic Successfully',
                'data' => $topic
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to create topic',
                'data' => $ex
            ], 500);
        }
    }

    public function show()
    {
    }
}
