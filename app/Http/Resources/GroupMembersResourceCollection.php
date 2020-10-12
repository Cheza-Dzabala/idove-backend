<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupMembersResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $reponse = [];
        foreach($this->collection as $member) {
            $temp = [
                'user' => Formatter::user($member->user)
            ];
            array_push($reponse, $temp);
        }
        return $reponse;
    }
}
