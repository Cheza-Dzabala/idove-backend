<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteResourceGallery extends Model
{
    //
    protected $table = 'website_resources_galleries';


    public function category() {
        return $this->belongsTo(WebsiteResourceGalleryCategory::class, 'category_id');
    }
}
