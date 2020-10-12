<?php

namespace App\Http\Controllers;

use App\Groups;
use App\Http\Requests\GroupRequest;
use App\Http\Resources\Groups as GroupsResource;
use App\Utilities\Images\ImageProcessor;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{

    public function index()
    {
        $groups = new GroupsResource(
            Groups::with(['members'])->whereHas('members', function($q){
                $q->where('user_id', '=', Auth::user()->id);
            })
            ->orWhere('admin_id', '=', Auth::user()->id)->get()
        );
        return response()->json([
            'message' => 'Your groups',
            'data' => $groups
        ], 200);
    }

    public function create(GroupRequest $request)
    {
        $group = new Groups();
        $group->admin_id = Auth::user()->id;
        $group->fill($request->toArray());
        $processor = new ImageProcessor();
        $avatar = $request->avatar;
        if ($avatar) {
            $group->avatar  = $processor->resize(
                $avatar,
                Auth::user()->username . '_group_' . uniqid(),
                300,
                300,
                ImageProcessor::$IMAGES_PATH . '/'
            );
        }

        $group->save();

        return response()->json([
            'message' => 'Successfully created group',
            'data' => $group
        ], 201);
    }
}
