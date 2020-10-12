<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UpdateProfile;
use App\Http\Resources\ProfileResource;
use App\Profile;
use App\User;
use App\Utilities\Images\ImageProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = Profile::whereUserId(Auth::user()->id)->first();

        return response()->json([
            'message' => (!$profile) ? 'No profile available' : 'Your profile',
            'data' =>  $profile
        ], (!$profile) ? 404 : 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $profile = new Profile();

        $user = User::whereId(Auth::user()->id)->first();

        $avatar = $request->avatar;

        $cover_image = $request->cover_image;

        $processor = new ImageProcessor();

        $profile->fill($request->toArray());

        $profile->slug = Str::slug($user->username);

        $profile->user_id = Auth::user()->id;

        if ($avatar) {
            $profile->avatar  = $processor->resize(
                $avatar,
                $user->username . '_avatar_' . uniqid(),
                300,
                300,
                ImageProcessor::$AVATAR_PATH . '/'
            );
        }

        if ($cover_image) {
            $profile->cover_image = $processor->resize(
                $cover_image,
                $user->username . '_cover_images_' . uniqid(),
                1268,
                423,
                ImageProcessor::$COVER_IMAGE_PATH . '/'
            );
        }

        $profile->save();

        return response()->json([
            'message' => 'Successfully Saved your profile',
            'data' => $profile
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $profile_response = new ProfileResource(Profile::whereSlug($profile->slug)->first());

        return response()->json([
            'message' => (!$profile) ? 'No profile available' : 'Your profile',
            'data' =>  $profile_response
        ], (!$profile) ? 404 : 200);
    }

    public function view()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request, Profile $profile)
    {
        $user = User::whereId(Auth::user()->id)->first();

        $avatar = $request->avatar;
        $cover_image = $request->cover_image;

        $processor = new ImageProcessor();

        $profile->fill($request->toArray());


        if ($avatar) {
            $profile->avatar  = $processor->resize(
                $avatar,
                $user->username . '_avatar_' . uniqid(),
                300,
                300,
                ImageProcessor::$AVATAR_PATH . '/'
            );
        }

        if ($cover_image) {
            $profile->cover_image = $processor->resize(
                $cover_image,
                $user->username . '_cover_images_' . uniqid(),
                1268,
                423,
                ImageProcessor::$COVER_IMAGE_PATH . '/'
            );
        }


        $profile->save();

        // dd($profile);


        return response()->json([
            'message' => 'successfully updated your profile',
            'data' => $profile
        ], 205);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
