<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\ProjectsRequest;
use App\Http\Resources\ProjectCountryCollection;
use App\Http\Resources\ProjectsCategoriesCollection;
use App\Http\Resources\ProjectsCollection;
use App\ProjectCategory;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json([
            'message' => 'All projects',
            'data' => new ProjectsCollection(Project::get())
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProjectsRequest $request)
    {
        //
        $project = new Project();
        $project->fill($request->toArray());
        $project->user_id = Auth::user()->id;
        try {
            $project->save();
            return response()->json([
                'message' => 'Created Project',
                'data' => $project
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something went wrong',
                'data' => $ex
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function filter($filter)
    {
        if ($filter === 'mine') {
            $projects = new ProjectsCollection(Project::whereUserId(Auth::user()->id)->get());
        }
        if ($filter === 'type') {
            $projects = new ProjectsCategoriesCollection(ProjectCategory::get());
        }
        if ($filter === 'countries') {
            $projects = new ProjectCountryCollection(Country::get());
        }

        return response()->json([
            'message' => 'your projects',
            'data' => $projects
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Project $projects)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $projects)
    {
        //
    }
}
