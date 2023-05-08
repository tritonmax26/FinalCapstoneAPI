<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'branch' => $this->branch,
            'service' => $this->service,
            'about'=> $this->about,
            'user' => [
                'id' => $this -> user -> id,
                'name' => $this -> user -> name
            ]
        ];
    }
}
