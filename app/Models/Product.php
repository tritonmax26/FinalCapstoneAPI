<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'user_id',
        'shop_id',
        'name',
        'description',
        'price',
        'branch',
        'image'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
