<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category,
            'location' => $this->location,
            'description' => $this->description,
            'client_name' => $this->client_name,
            'featured_image' => $this->featured_image,
            'images' => $this->images->pluck('image_path'),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
