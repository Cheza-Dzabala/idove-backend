<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Http\Resources\WebsiteForumsResourceCollection;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;

class WebsiteForumsController extends Controller
{
    public function index()
    {
        $forums = Forum::with(['topics.posts'])->get();
        $posts = Post::latest()->take(10)->get();
        return view('website.forums.index', compact('forums', 'posts'));
    }
}
