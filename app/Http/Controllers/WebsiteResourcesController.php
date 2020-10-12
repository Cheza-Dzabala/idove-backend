<?php

namespace App\Http\Controllers;

use App\WebsiteResourceGalleryCategory;
use App\WebsiteResourcesDocument;
use App\WebsiteResourcesVideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteResourcesController extends Controller
{
    //

    public function index(){
        $documents = WebsiteResourcesDocument::whereIsActive(true)->get();
        return view('website.resources.index', compact('documents'));
    }

    public function show(WebsiteResourcesDocument $resource) {
        $type = pathinfo($resource->file, PATHINFO_EXTENSION);
        return Storage::download('public/'.$resource->file, $resource->name.'.'.$type);
    }
}
