<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteResourceGalleryCategory extends Model
{
    //
    protected $table = 'website_resources_galleries_categories';

    public function images() {
        return $this->hasMany(WebsiteResourceGallery::class, 'category_id', 'id');
    }

    public function image_count() {
        return $this->images()->count();
    }
}
