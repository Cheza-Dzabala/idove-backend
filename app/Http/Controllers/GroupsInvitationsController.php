<?php

namespace App\Http\Controllers;

use App\GroupInvites;
use App\GroupMembers;
use App\Groups;
use App\Notifications;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsInvitationsController extends Controller
{
    //
    public function create(Groups $group, User $user)
    {
        $invite = new GroupInvites();
        $invite->invitee = $user->id;
        $invite->group_id = $group->id;

        try {
            $invite->save();
            $notification = new Notifications();
            $notification->user_id =  $user->id;
            $notification->source =  Auth::user()->id;
            $notification->message =  'Invited To Join the group ' . $group->name;
            $notification->type =  'group';
            $notification->entity = 'App\Groups';
            $notification->save();
            return response()->json([
                'message' => 'Successfully sent invite',
                'data' => $invite
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $ex
            ], 500);
        }
    }

    public function show(Groups $group)
    {
        return response()->json([
            'message' => 'Your invitations',
            'data' => $group->invites
        ], 200);
    }

    public function respond(Groups $group)
    {

        try {
            $invite = GroupInvites::whereInvitee(Auth::user()->id)->whereGroupId($group->id)->first();
            $invite->status = 'accepted';
            $invite->save();


            $member = new GroupMembers();
            $member->user_id = Auth::user()->id;
            $member->group_id = $group->id;
            $member->save();

            $notification = new Notifications();

            $notification->user_id =  $group->admin->id;
            $notification->source =  Auth::user()->id;
            $notification->message =  Auth::user()->username . ' Accepted your invitation to join your group ' . $group->name;
            $notification->type =  'group';
            $notification->entity = 'App\Groups';
            $notification->save();

            return response()->json([
                'message' => 'Accepted Invitation',
                'data' => $group->invites
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Unable to Accept Invitation',
                'data' => $ex
            ], 400);
        }
    }
}
