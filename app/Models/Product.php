<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','price','stock','category','decription','image','category_id'];

    protected $table ='products';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'product_carts');
    }

}
