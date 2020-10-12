<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TopicResourceCollection extends ResourceCollection
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

        foreach ($this->collection as $topic) {
            $date = new Carbon($topic->created_at);
            $temp = [
                'id' => $topic->id,
                'slug' => $topic->slug,
                'published' => $date->diffForHumans(),
                'title' => $topic->title,
                'post_count' => $topic->posts->count(),
                'author' => Formatter::user($topic->owner),
            ];
            array_push($response, $temp);
        };

        return $response;
    }


    private function formatForum($forum)
    {
        $pubdate = new Carbon($forum->created_at);
        $temp = [
            'title' => $forum->title,
            'slug' => $forum->slug,
            'admin' => Formatter::user($forum->owner),
            'published' => $pubdate->diffForHumans()
        ];
        return json_decode(json_encode($temp));
    }
}
