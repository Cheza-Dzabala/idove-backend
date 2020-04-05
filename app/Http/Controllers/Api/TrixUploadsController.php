<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Utilities\Images\ImageProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrixUploadsController extends Controller
{
    public function upload(Request $request)
    {
        $user = User::whereId(Auth::user()->id)->first();

        $processor = new ImageProcessor();

        $image = $request->image;

        $url = $processor->resize(
            $image,
            $user->username . '_trix_' . uniqid(),
            300,
            300,
            ImageProcessor::$TRIX_IMAGES . '/'
        );

        return response()->json([
            'url' => $url
        ], 201);
    }
}
