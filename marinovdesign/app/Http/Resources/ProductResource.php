<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'dimension' => $this->dimension,
            'weight' => $this->weight,
            'price' => $this->price,
            'discount_percentage' => $this->discount_percentage,
            'discount_price' => $this->discount_price,
            'category' => $this->category,
            'type' => $this->type,
            'images' => ProductGalleryResource::collection($this->images),
            'materials' => MaterialResource::collection($this->materials),
            'maintenances' => MaintenanceResource::collection($this->maintenances)
        ];
    }
}
