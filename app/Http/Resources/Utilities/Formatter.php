<?php

namespace App\Http\Resources\Utilities;

use Carbon\Carbon;

class Formatter
{
    public static function user($user)
    {
        $format = [
            'id' => $user->id,
            'full_name' => $user->getFullNameAttribute(),
            'username' => $user->username,
            'slug' => $user->profile->slug,
            'avatar' => $user->profile->avatar,
        ];

        return json_decode(json_encode($format));
    }

    public static function processComments($comments)
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
                'likers' => Formatter::processLikes($comment->likes),
            ];

            array_push($all_comments, $temp);
        }
        return $all_comments;
    }

    public static function processLikes($likes)
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
