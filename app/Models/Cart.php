<?php

namespace App\Models;


use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'product_id' ,
    ];


    public function gitproducts()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
