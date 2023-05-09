<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Product;

class Shop extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'shop_id',
        'id',
        'name',        
        'branch',
        'service',
        'about',
        'image'   
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class)->orderBY('created_at', 'desc');
    }
}
