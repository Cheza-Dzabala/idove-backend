<?php

namespace App\Http\Controllers;

use App\GroupMembers;
use App\Groups;
use App\Http\Resources\GroupMembersResourceCollection;
use Illuminate\Http\Request;

class GroupUsersController extends Controller
{
    public function show(Groups $group) {
        return response()->json([
            'message' => 'Members',
            'data' =>  new GroupMembersResourceCollection(GroupMembers::whereGroupId($group->id)->get())
        ], 200);
    }
}
