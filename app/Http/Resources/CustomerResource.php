<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'avatar'       => url('uploads/customers/avatar').'/'.$this->avatar,
            'name'         => $this->name,
            'country_key'  => $this->key,
            'phone'        => $this->phone,
            'gender'       => $this->gender,
            'email'        => $this->email,
            'fb_token'     => $this->fb_token,
            'cars_count'   => $this->cars_not_deleted->count(),
            'access_token' => $this->access_token,
            'city'         => new CitiesResource($this->city),
            'cars'         => CustomerCarResource::collection($this->cars)->resource,
        ];
    }
}
