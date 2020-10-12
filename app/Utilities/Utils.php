<?php

namespace App\Utilities;

class Utils
{
    public static function checkSlug($class, $slug)
    {
        $count = $class::where('slug', 'like', $slug)->count();
        return $count;
    }
}
