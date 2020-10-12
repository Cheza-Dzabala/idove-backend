<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsfeedResourceCollection;
use App\StatusUpdate;
use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    //
    public function index()
    {
        $updates = new NewsfeedResourceCollection(StatusUpdate::latest()->take(30)->get());
        return response()->json([
            'message' => 'Your newsfeed',
            'data' => $updates
        ], 200);
    }
}
