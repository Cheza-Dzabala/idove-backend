<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Mail\UserRegistered;
use App\Token;
use App\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RegistrationController extends Controller
{
    //
    public function store(RegistrationRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'is_active' => false
        ]);

        $token_string = md5(uniqid(rand(), true));

        Token::create([
            'token' => $token_string,
            'user_id' => $user->id
        ]);

        Mail::to($user->email)->send(new UserRegistered($token_string, $user));

        return response()->json([
            'message' => 'Successfully registered your account, kindly check your email to activate it',
            'data' => null
        ], 201);
    }

    public function activate(ActivationRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            throw new HttpException(400, 'This user is not registered on the platform');
        }

        if ($user->email_verified_at) {
            throw new HttpException(400, 'This email is already verified');
        }

        if (!$user->token) {
            return response()->json([
                'message' => 'Incorrect Email'
            ], 400);
        }

        if ($user->token->token !== $request->token) {
            throw new HttpException(400, 'This token does not belong to this user');
        }

        $user->email_verified_at = now();
        $user->is_active = true;

        $user->save();

        return response()->json([
            'message' => 'Successfully activated your account, proceed to login.'
        ], 200);
    }
}
