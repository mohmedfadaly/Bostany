<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosisHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid'      => $this->uuid,
            'car_uuid'  => $this->Car->uuid,
            'trouble'   => $this->trouble,
            'pending'   => $this->pending,
            'permanent' => $this->permanent,
            'date'      => $this->date,
            'time'      => $this->time,
        ];
    }
}
