<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Parameter extends JsonResource
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
            'cute' => $this->cute,
            'cool' => $this->cool,
            'wild' => $this->wild,
            'beautiful' => $this->beautiful,
            'fresh' => $this->fresh,

            'kind' => $this->kind,
            'gentle' => $this->gentle,
            'quiet' => $this->quiet,
            'active' => $this->active,
            'scare' => $this->scare,

            'action' => $this->action,
            'power' => $this->power,
            'speed' => $this->speed,
            'strategy' => $this->strategy,
            'endurance' => $this->endurance,

            'logic' => $this->logic,
            'knowledge' => $this->knowledge,
            'vocabulary' => $this->vocabulary,
            'forecast' => $this->forecast,
            'memory' => $this->memory,
    ];
    }
}
