<?php

namespace App\Http\Controllers;

use App\Http\Resources\MapsResourceCollection;
use App\MapCountry;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    //
    public function index(){
        $countries = new MapsResourceCollection(MapCountry::get());
        return response()->json([
            'message' => 'countries',
            'data' => $countries
        ], 200);
    }
}
