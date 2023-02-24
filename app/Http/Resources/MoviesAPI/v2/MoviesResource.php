<?php

namespace App\Http\Resources\MoviesAPI\v2;

use Illuminate\Http\Resources\Json\JsonResource;

class MoviesResource extends JsonResource
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
            'movie_title' => $this->title,
            'story_line' => $this->storyline,
            'lang' => $this->language,
            'box_office' => "$".$this->box_office,
            'run_time' => $this->runtime
        ];
        // return parent::toArray($request);
    }
}
