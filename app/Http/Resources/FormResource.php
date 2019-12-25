<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
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
            'id'=>$this->id,
            'description'=>$this->description,
            'bg_color'=>$this->bg_color,
            'title'=>$this->title,
            'date'=>$this->date,
            'place'=>$this->place,
            'btn_name'=>$this->btn_name,
            'btn_color'=>$this->btn_color,
            'fields'=>FieldResource::collection($this->fields),
        ];
    }
}
