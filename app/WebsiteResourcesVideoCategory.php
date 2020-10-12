<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteResourcesVideoCategory extends Model
{
    //
    protected $table = 'website_resource_video_categeories';

    public function videos() {
        return $this->hasMany(WebsiteResourcesVideo::class, 'category_id');
    }
}
