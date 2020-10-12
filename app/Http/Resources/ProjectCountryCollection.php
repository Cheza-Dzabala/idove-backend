<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class ProjectCountryCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $response = [];

        $filtered = $this->collection->filter(function ($country, $key) {
            return $country->project_count() > 0;
        });

        foreach ($filtered as $country) {
            $item = [
                'name' => $country->name,
                'project_count' => $country->project_count()
            ];
            array_push($response, $item);
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
            'user' => Formatter::user($project->user),
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
