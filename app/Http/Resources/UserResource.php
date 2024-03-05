<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->resource->id,
            "name" => $this->resource->name,
            "family" => $this->resource->family,
            "username" => $this->resource->username,
//            "roles" => $this->whenLoaded("roles", fn() => $this->resource->roles),
            "roles" => $this->resource->roles,
        ];
    }
}
