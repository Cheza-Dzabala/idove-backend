<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post_on = new Carbon($this->created_at);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => Formatter::user($this->author),
            'post' => $this->post,
            'published' =>  $post_on->diffForHumans(),
            'comments' => $this->processComments($this->comments)
        ];
    }


    private function processComments($comments)
    {
        $all_comments = [];
        foreach ($comments as $comment) {
            $posted = new Carbon($comment->created_at);
            $temp = [
                'id' => $comment->id,
                'text' => $comment->comment,
                'author' => Formatter::user($comment->author),
                'posted_on' => $posted->diffForHumans(),
                'likes' => $comment->likes->count(),
                'likers' => $this->processLikes($comment->likes),
            ];

            array_push($all_comments, $temp);
        }
        return $all_comments;
    }

    private function processLikes($likes)
    {
        $all_likes = [];

        foreach ($likes as $like) {
            $temp = [
                'id' => $like->id,
                'user' => Formatter::user($like->user),
            ];

            array_push($all_likes, $temp);
        }
        return $all_likes;
    }
}
