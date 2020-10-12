<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class WebsiteUsersController extends Controller
{
    //
    public function index()
    {
        $users = User::whereIsStaff(false)->with(['profile'])->paginate(10);
        return view('website.idovers.index', compact('users'));
    }

    public function show(Profile $profile)
    {
        return view('website.idovers.show', compact('profile'));
    }
}
