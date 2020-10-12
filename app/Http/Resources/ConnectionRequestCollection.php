<?php

namespace App\Http\Resources;

use App\Http\Resources\Utilities\Formatter;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ConnectionRequestCollection extends ResourceCollection
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
        foreach ($this->collection as $connReq) {
            $date =  new Carbon($connReq->created_at);
            $temp = [
                'id' => $connReq->id,
                'sender' => Formatter::user($connReq->sent_by),
                'status' => $connReq->status,
                'sent_on' => $date->diffForHumans()
            ];

            array_push($response, $temp);
        }

        return $response;
    }
}
