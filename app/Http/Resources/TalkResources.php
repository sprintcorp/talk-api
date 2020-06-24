<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TalkResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=> $this->id,
            'title' => $this->title,
            'event_date' => $this->event_date,
            'description' => $this->description,
            'slug' => $this->slug,
            'created_at' => $this->created_at->diffForHumans(),
            ];
    }
}