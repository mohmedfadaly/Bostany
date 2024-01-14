<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MalfunctionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($request->type === "simple") { 
            return [
                'code'              => $this->code,
                'desc'              => $this->desc,   
                'symptoms'          => null,
                'potential_causes'  => null,
                'solution'          => null,
                'maker_code'        => $this->maker_code,
                'model_code'        => $this->model_code,
            ];
        }elseif($request->type === "basic")
        {
            return [
                'code'              => $this->code,
                'desc'              => $this->desc,
                'symptoms'          => $this->symptoms,
                'potential_causes'  => null,
                'solution'          => null,
                'maker_code'        => $this->maker_code,
                'model_code'        => $this->model_code,
            ];
        }elseif($request->type === "details")
        {
            return [
                'code'              => $this->code,
                'desc'              => $this->desc,
                'symptoms'          => $this->symptoms,
                'potential_causes'  => $this->potential_causes,
                'solution'          => null,
                'maker_code'        => $this->maker_code,
                'model_code'        => $this->model_code,
            ];
        }elseif($request->type === "accuracy")
        {
            return [
                'code'              => $this->code,
                'desc'              => $this->desc,
                'symptoms'          => $this->symptoms,
                'potential_causes'  => $this->potential_causes,
                'solution'          => $this->solution,
                'maker_code'        => $this->maker_code,
                'model_code'        => $this->model_code,
            ];
        }
    }
}
