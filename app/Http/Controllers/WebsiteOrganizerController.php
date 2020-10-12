<?php

namespace App\Http\Controllers;

use App\WebsiteOrganizer;
use Illuminate\Http\Request;

class WebsiteOrganizerController extends Controller
{
    //
    public function index() {
        $organizers = WebsiteOrganizer::whereIsActive(true)->get();
        return view('website.organizers.index', compact('organizers'));
    }
}
