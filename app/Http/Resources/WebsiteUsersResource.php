<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WebsiteUsersResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [];

        foreach ($this->collection as $user) {
            $temp = [
                'name' => $user->full_name,
            ];
            array_push($response, $temp);
        }
        return $response;
    }
}
