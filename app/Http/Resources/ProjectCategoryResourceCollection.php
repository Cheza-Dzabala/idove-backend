<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCategoryResourceCollection extends ResourceCollection
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
        foreach($this->collection as $category) {
            $temp = [
                'label' => $category->name,
                'value' => $category->id,
                'key' =>  $category->id,
            ];

            array_push($response, $temp);
        }
        return $response;
    }
}
