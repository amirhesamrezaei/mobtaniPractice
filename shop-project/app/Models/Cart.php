<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    // هر سبد متعلق به یک کاربر است
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // هر سبد چندین آیتم دارد
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
