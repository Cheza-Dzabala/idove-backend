<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //

    public function index(Request $request)
    {
        $users = User::where('id', '!=', Auth::user()->id)->with(['profile'])
            ->whereIsStaff(false)
            ->get();
        return response()->json([
            'message' => 'All users',
            'data' => $users
        ], 200);
    }
}
