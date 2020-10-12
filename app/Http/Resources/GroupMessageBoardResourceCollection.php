<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupMessageBoardResourceCollection extends ResourceCollection
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

        foreach($this->collection as $message) {
            $item = [
                'message' => $message->message,
                'author' => Formatter::user($message->author),
                'comment_count' => $message->comments->count(),
                'like_count' => $message->likes->count(),
                'likes' => Formatter::processLikes($message->likes),
                'comments' => Formatter::processComments($message->comments)
            ];
            array_push($response, $item);
        }
        return $response;
    }
}
