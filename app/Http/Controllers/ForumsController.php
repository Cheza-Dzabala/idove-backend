<?php

namespace App\Http\Controllers;

use App\Forum;
use App\Http\Requests\ForumRequest;
use App\Http\Resources\ForumResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'Forums',
            'data' => new ForumResourceCollection(Forum::orderBy('created_at', 'desc')->get())
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ForumRequest $request)
    {
        $forum = new Forum();
        $forum->fill($request->toArray());
        $forum->admin_id = Auth::user()->id;
        try {
            $forum->save();
            return response()->json([
                'message' => 'Created Forum Successfully',
                'data' => $forum
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something went wrong',
                'data' => $ex
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
