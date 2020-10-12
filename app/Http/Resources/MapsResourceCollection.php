<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MapsResourceCollection extends ResourceCollection
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
        foreach ($this->collection as $item) {
            $collected = [
                        'country' => $item->abbr,
                        'name' => $item->name,
                        'idovers' => $item->idover_count,
            ];
            array_push($response, $collected);
        }

        return  json_decode(json_encode($response));
    }
}
