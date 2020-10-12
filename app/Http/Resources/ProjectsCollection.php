<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Utilities\Formatter;

class ProjectsCollection extends ResourceCollection
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
        $end_date = null;

        foreach ($this->collection as $project) {
            $start_date = new Carbon($project->start_date);
            if ($project->end_date) {
                $end_date = new Carbon($project->end_date);
            }
            $temp = [
                'name' => $project->name,
                'category' => $project->category->name,
                'banner' => $project->banner,
                'start_date' => $start_date->isoFormat('MMMM Do YYYY'),
                'tags' => $project->tags,
                'summary' => $project->short_summary,
                'description' => $project->description,
                'country' => $project->country,
                'user' => Formatter::user($project->user)
            ];
            isset($end_date) ? $temp['end_date'] = $end_date->isoFormat('MMMM Do YYYY') : null;
            array_push($response, $temp);
        }
        return $response;
    }
}
