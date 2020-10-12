<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    //
    public function index()
    {
        $notifications = Notifications::whereUserId(Auth::user()->id)->whereRead(false)->latest()->get()->take(5);
        return response()->json([
            'message' => 'Your Notifications',
            'data' => $notifications
        ], 200);
    }

    public function show()
    {
        $notifications = Notifications::whereUserId(Auth::user()->id)->get();
        return response()->json([
            'message' => 'Your Notifications',
            'data' => $notifications
        ], 200);
    }
}
