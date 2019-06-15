<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\EpisodeCollection;
class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
        'title'=>$this->title,
        'body' => $this->body ,
        'price' => $this->price ,
        // 'price1' => $this->when(0,10,100) ,
        'image' =>$this->image,
         'createdTime'=>(string)$this->created_at,
        'episodes'=> new EpisodeCollection($this->episodes)
        ];
    }
}
