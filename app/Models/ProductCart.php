<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCart extends Pivot
{
    protected $table = 'product_carts';

    protected $fillable = ['product_id', 'cart_id', 'quantity'];

    // Puedes agregar relaciones si es necesario
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
