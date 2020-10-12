<?php

namespace App\Http\Controllers;

use App\WebsitePartner;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function index(){
        $partners = WebsitePartner::get();
//        dd($partners);
        return view('website.welcome', compact('partners'));
    }
}
