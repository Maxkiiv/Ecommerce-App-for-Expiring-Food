<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table('order_products')]
#[Fillable(['order_id', 'product_id', 'user_id', 'price', 'quantity'])]
class OrderProduct extends Model
{
    use HasFactory;
}
