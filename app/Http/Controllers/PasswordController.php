<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function create(User $user)
    {
        return view('passwords.reset');
    }

    public function store(Request $request)
    {
        // dd($request);
        $user = User::whereId(Auth::id())->first();
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'current_password' => 'required',
            'password_confirmation' => 'required'
        ]);

        if(!Hash::check($request->current_password, $user->password))
            return redirect()->back()->withErrors(['current_password', 'Current password does not match password on file.']);


        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home')->with('success', 'Successfully updated your password');
    }
}
