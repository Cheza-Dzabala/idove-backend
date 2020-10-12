<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsfeedResourceCollection extends ResourceCollection
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

        foreach ($this->collection as $update) {
            $posted = new Carbon($update->created_at);
            $temp = [
                'id' => $update->id,
                'user' => Formatter::user($update->author),
                'update' => $update->update,
                'comments' => Formatter::processComments($update->comments),
                'likes' => Formatter::processLikes($update->likes),
                'posted' => $posted->diffForHumans()
            ];

            array_push($response, $temp);
        }
        return $response;
    }
}
