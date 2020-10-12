<?php

namespace App\Http\Middleware;

use App\GroupMembers;
use Closure;
use Illuminate\Support\Facades\Auth;

class GroupsMembersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */



    public function handle($request, Closure $next)
    {
        $is_member = false;

        $user_id = Auth::user()->id;

        $members = GroupMembers::whereGroupId($request->group->id)->get()->toArray();

        foreach($members as $member) {
            if($member['user_id'] === $user_id)
            $is_member = true;
        }

        if($request->group->admin_id === $user_id || $is_member === true) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Not a member or admin',
        ], 403);
    }
}
