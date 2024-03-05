<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ImageResource extends JsonResource
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
            "title" => $this->resource->title,
            "scope" => $this->resource->scope->label(),
            'image' => $this->getFirstMediaUrl(),
            'comments' => $this->when(
                Str::contains($request->route()->getName(), "show"),
                fn() => $this->resource->comments
            )
        ];
    }
}
