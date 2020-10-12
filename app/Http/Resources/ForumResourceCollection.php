<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ForumResourceCollection extends ResourceCollection
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
        foreach ($this->collection as $forum) {
            $creation = new Carbon($forum->created_at);
            $temp = [
                'id' => $forum->id,
                'title' => $forum->title,
                'slug' => $forum->slug,
                'description' => $forum->description,
                'topic_count' => $forum->topics->count(),
                'post_count' => $this->count_posts($forum->topics),
                'admin' => Formatter::user($forum->owner),
                'published' => $creation->diffForHumans()
            ];
            array_push($response, $temp);
        }
        return $response;
    }

    private function count_posts($topics)
    {
        $count = 0;

        foreach ($topics as $topic) {
            $posts = $topic->posts->count();
            $count += $posts;
        }

        return $count;
    }
}
