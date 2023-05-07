<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class ShopShowResource extends JsonResource
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
            'user_id' => $this-> user_id,
            'image' => $this->image,
            'name' => $this->name,
            'branch' => $this->branch,            
            'service' => $this->service,
            'about' => $this->about,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name                
            ],
            'products' => ProductResource::collection($this->products)
        ];
    }
}

// 'name',        
// 'branch',
// 'service',
// 'about',
// 'image',