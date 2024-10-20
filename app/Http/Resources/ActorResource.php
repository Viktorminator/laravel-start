<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'perfumes' => $this->perfumes->map(function ($perfume) {
                return [
                    'resource_id' => $perfume->resource_id,
                    'name' => $perfume->name,
                ];
            }),
        ];
    }
}
