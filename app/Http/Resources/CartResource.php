<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $listitems = $this->items;
        $itemnames = " ";
        $totalPrice = 0.00;
        foreach ($listitems as $item) {
            $itemnames = $itemnames.$item->title." ";
            $totalPrice += $item->price;
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'totalPrice' => "€" . $totalPrice,
            'itemnames' => $itemnames
        ];
    }
}

