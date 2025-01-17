<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    protected static function booted(): void
    {
        static::deleting(function (Cart $cart) {
            $cart->items()->each(function($items) {
                $items->delete();
             });
        });
    }
}
