<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceCentersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'logo'     => asset('uploads/maintenance_centers/'.$this->logo),
            'name'     => $this->name,
            'phones'   => $this->phones ? explode(' ',$this->phones) : null,
            'emails'   => $this->emails ? explode(' ',$this->emails) : null,
            'lat'      => $this->lat,
            'lng'      => $this->lng,
            'address'  => $this->address,
            'distance' => $this->distance ? round($this->distance,2) : 0,
            'city_id'  => $this->city_id,
            'city'     => new CitiesResource($this->City),
            'dates'    => json_decode($this->dates)
        ];
    }
}
