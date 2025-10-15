<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'address' => $this->address,
            'description' => $this->description,
            'land_area' => $this->land_area,
            'type' => $this->type,
            'price' => $this->price,
            'facilities' => $this->facilities,
            'remaining_units' => $this->remaining_units,
            'status' => $this->status,
            'featured_image' => $this->featured_image,
            'images' => $this->images->pluck('image_path'),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
