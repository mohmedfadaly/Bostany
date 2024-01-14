<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid'              => $this->uuid,
            'display_name'      => $this->display_name,
            'maker_name'        => $this->maker_name,
            'maker_code'        => $this->maker_code,
            'model_name'        => $this->model_name,
            'model_code'        => $this->model_code,
            'year'              => $this->year,
            'fuel_type'         => $this->fuel_type,
            'displacement'      => $this->displacement,
            'is_hybrid'         => $this->is_hybrid,
            'is_current_active' => $this->is_current_active,
            'vin'               => $this->vin,
        ];
    }
}
