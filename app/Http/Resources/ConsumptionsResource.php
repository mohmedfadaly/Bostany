<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsumptionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid'                  => $this->uuid,
            'car_uuid'              => $this->Car->uuid,
            'category'              => $this->category,
            'type'                  => $this->type,
            'distance'              => $this->distance,
            'time'                  => $this->time,
            'replacement_distance'  => $this->replacement_distance,
            'replacement_date'      => $this->replacement_date,
        ];
    }
}
