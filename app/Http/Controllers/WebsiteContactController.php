<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteContactController extends Controller
{
    //
    public function index() {
        return view('website.contact.index');
    }
}
