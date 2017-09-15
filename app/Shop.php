<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $casts = [
        'product_link' => 'array',
        'quantity' => 'array'
    ];

    protected $fillable = ['product_link', 'quantity', 'first_name', 'last_name', 'email', 'phone', 'delivery_address'];
}
