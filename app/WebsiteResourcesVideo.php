<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteResourcesVideo extends Model
{
    //
    protected $table = 'website_resource_video';

    public function category() {
        return $this->belongsTo(WebsiteResourcesVideoCategory::class, 'category_id');
    }
}
