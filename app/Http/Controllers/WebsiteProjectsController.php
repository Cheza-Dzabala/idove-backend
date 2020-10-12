<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class WebsiteProjectsController extends Controller
{
    //
    public function index() {
        $projects = Project::latest()->paginate(2);
        return view('website.projects.index', compact('projects'));
    }
    public function show(Project $project) {
        return view('website.projects.show', compact('project'));
    }
}
