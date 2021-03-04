<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable = [
            'product_name',
            'cat_id',
            'sup_id',
            'photo',
            'product_code',
            'product_garage',
            'product_route',
            'buy_date',
            'expire_date',
            'buying_price',
            'selling_price'
            ];
}
