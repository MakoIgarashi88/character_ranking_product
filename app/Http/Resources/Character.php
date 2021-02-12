<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Character extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'anime_title' => $this->anime_title,
            'image_name' => ($this->image_name) ? $this->image_name : '/storage/images/default.jpeg',
            'character_voice' => $this->character_voice,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'age' => $this->age,
            'blood_type' => $this->blood_type,
            'height' => $this->height,
            'weight' => $this->weight,
            'detail' => $this->detail,
        ];
    }
}
