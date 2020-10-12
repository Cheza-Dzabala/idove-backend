<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostResourceCollection extends ResourceCollection
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
        foreach ($this->collection as $post) {
            $post_on = new Carbon($post->created_at);
            $temp = [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'author' => Formatter::user($post->author),
                'comment_count' => $post->comments->count(),
                'published' => $post_on->diffForHumans()
            ];
            array_push($response, $temp);
        }
        return $response;
    }
}
