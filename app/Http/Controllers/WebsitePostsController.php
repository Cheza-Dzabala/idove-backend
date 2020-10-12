<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;

class WebsitePostsController extends Controller
{
    //
    public function show(Forum $forum, Topic $topic, Post $post)
    {
        $all_posts = Post::whereUserId($post->user_id)
            ->where('slug', '<>', $post->slug)
            ->get();
        return view('website.posts.index', compact('post', 'all_posts'));
    }
}
