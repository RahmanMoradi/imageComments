<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            "user" => UserResource::make($this->resource->user),
            "image" => ImageResource::make($this->resource->image),
            "body" => $this->resource->body,
        ];
    }
}
