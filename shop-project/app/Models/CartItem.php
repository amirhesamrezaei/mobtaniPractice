<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

    // هر آیتم متعلق به یک سبد است
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // هر آیتم متعلق به یک محصول است
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
