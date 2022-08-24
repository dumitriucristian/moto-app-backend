<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'startDate' => $this->start_date,
            'endDate' => $this->end_date,
            'userId' => $this->user_id
        ];

        /*
         * "id": 5,
            "user_id": 1,
            "title": "Mr.",
            "description": "Libero dignissimos tenetur cupiditate. Quam nihil reprehenderit nisi. Amet quam voluptates dolores et non consequatur.",
            "status": "published",
            "start_date": "2016-11-10 21:57:07",
            "end_date": "2015-06-09 08:13:13",
            "created_at": "2022-08-23T08:44:04.000000Z",
            "updated_at": "2022-08-23T08:44:04.000000Z"
         */
    }
}
