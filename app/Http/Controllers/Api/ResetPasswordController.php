<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetConfirmation;
use App\Http\Requests\PasswordResetRequest;
use App\Mail\ResetEmailToken;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    //
    public function index(PasswordResetRequest $request){
        $user = User::whereEmail($request->email)->first();

        if(!$user) {
            return response()->json([
                'message' => 'This email is not registered on the iDove platform.',
                'data' => null
            ], 404);
        }

        $token_string = md5(uniqid(rand(), true));
        Token::create([
            'token' => $token_string,
            'user_id' => $user->id
        ]);
        Mail::to($user->email)->send(new ResetEmailToken($user, $token_string));
        return response()->json([
            'message' => 'Successfully sent email reset request, kindly check your email',
            'data' => null
        ], 200);
    }

    public function store(PasswordResetConfirmation $request, $token) {
        $token = Token::whereToken($token)->first();
        if(!$token) {
            return response()->json([
                'message' => 'This token is invalid',
                'data' => null
            ], 422);
        }
        $user = User::whereId($token->user_id)->first();
        try {
            $user->password = Hash::make($request->password);
            $user->save();
            $token->delete();
            return response()->json([
                'message' => 'Successfully Reset Password. Proceed to login',
                'data' => null
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong on the server',
                'data' => null
            ], 500);
        }
    }
}
