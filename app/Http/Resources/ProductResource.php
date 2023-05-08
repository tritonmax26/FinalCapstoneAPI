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
            'user_id' => $this->user_id,
            'shop_id' => $this->shop_id,
            'image' => $this->image,
            'name' => $this->name,            
            'description' => $this->description,
            'price' => $this->price,
            'branch' => $this->branch,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // 'user' => [
            //     'id' => $this->user->id,
            //     'name' => $this->user->name,
            //     'profile_picture' => $this->user->profile_picture
            // ]
        ];
    }
}