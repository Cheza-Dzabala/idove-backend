<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class Groups extends ResourceCollection
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [];

        foreach ($this->collection as $item) {
            $collected = [
                'id' => $item->id,
                'name' => $item->name,
                'avatar' => $item->avatar,
                'description' => $item->description,
                'member_count' => count($item->members),
                'is_admin' => (Auth::user()->id === $item->admin_id) ? true : false,
                'members' => $this->filterMembers($item->members)
            ];
            array_push($response, $collected);
        }

        return $response;
    }


    private function filterMembers($members)
    {
        $memberList = [];
        foreach ($members as $member) {
            $temp = [
                'id' => $member->user->id,
                'first_name' => $member->user->first_name,
                'last_name' => $member->user->last_name,
                'avatar' => $member->user->profile->avatar,
                'slug' => $member->user->profile->slug,
            ];

            array_push($memberList, $temp);
        }
        return $memberList;
    }
}
