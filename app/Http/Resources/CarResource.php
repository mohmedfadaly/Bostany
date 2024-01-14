<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id'         => $this->id,
            'logo'       => asset('uploads/cars/logo/'.$this->logo),
            'maker_name' => $this->maker_name,
            'maker_code' => $this->maker_code,
        ];
    }
}
