<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectCategoryResourceCollection;
use App\ProjectCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index(){
        $categories = new ProjectCategoryResourceCollection(ProjectCategory::get());
        return response()->json([
            'message' => 'categories',
            'data' => $categories
        ], 200);
    }
}
