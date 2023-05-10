<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'item_title' => $this->title,
            'item_price' => "€".$this->price,
            'item_description' => $this->description,
            'item_image' => $this->image_url,
        ];
    }
}
