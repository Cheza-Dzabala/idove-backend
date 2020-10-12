<?php

namespace App\Http\Controllers;

use App\WebsiteResourceGalleryCategory;
use App\WebsiteResourcesVideoCategory;
use Illuminate\Http\Request;

class WebsiteActivityController extends Controller
{
    //
    public function index() {
        $image_categories = WebsiteResourceGalleryCategory::whereIsActive(true)->whereHas('images')->get();
        $video_categories = WebsiteResourcesVideoCategory::whereIsActive(true)->whereHas('videos')->get();
        return view('website.activities.index', compact('image_categories', 'video_categories'));
    }
}
