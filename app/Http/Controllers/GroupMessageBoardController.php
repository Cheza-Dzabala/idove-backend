<?php

namespace App\Http\Controllers;

use App\GroupMessageBoard;
use App\Groups;
use App\Http\Requests\GroupMessageRequest;
use App\Http\Resources\GroupMessageBoardResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupMessageBoardController extends Controller
{
    //
    public function index(Groups $group) {
        $messages = new GroupMessageBoardResourceCollection(GroupMessageBoard::whereGroupId($group->id)->latest()->get());
        return response()->json([
            'message' => 'Message Board',
            'data' => $messages
        ], 200);
    }

    public function show() {

    }

    public function create(Groups $group, GroupMessageRequest $request) {
        $message = new GroupMessageBoard();
        $message->fill($request->toArray());
        $message->author_id = Auth::user()->id;
        $message->group_id = $group->id;
        try {
            $message->save();
            return response()->json([
                'message' => 'Successfully added to message board',
                'data' => $message
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to add to message board',
                'data' => $ex
            ], 500);
        }

    }
}
