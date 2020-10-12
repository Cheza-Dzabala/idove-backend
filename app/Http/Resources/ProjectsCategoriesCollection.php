<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class ProjectsCategoriesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [];

        foreach ($this->collection as $category) {
            $temp = [
                'id' => $category->id,
                'name' => $category->name,
                'projects' => $this->formatProjects($category->projects)
            ];

            array_push($response, $temp);
        }
        return $response;
    }

    private function formatProjects($projects)
    {
        $response = [];
        foreach ($projects as $project) {
            array_push($response, $this->formatProject($project));
        }
        return $response;
    }

    private function formatProject($project)
    {
        $start_date = new Carbon($project->start_date);
        if ($project->end_date) {
            $end_date = new Carbon($project->end_date);
        }
        $temp = [
            'id' => $project->id,
            'name' => $project->name,
            'category' => $project->category->name,
            'country' => $project->country_source->name,
            'country_code' => $project->country,
            'banner' => $project->banner,
            'start_date' => $start_date->isoFormat('MMMM Do YYYY'),
            'tags' => $project->tags,
            'summary' => $project->short_summary,
            'description' => $project->description,
            'user' => Formatter::user($project->user)
        ];
        isset($end_date) ? $temp['end_date'] = $end_date->isoFormat('MMMM Do YYYY') : null;
        if (Auth::user()->id === $project->user_id) {
            $temp['is_owner'] = true;
        } else {
            $temp['is_owner'] = false;
        }
        return $temp;
    }
}
