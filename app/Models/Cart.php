<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Table('cart')]
#[Fillable(['user_id', 'product_id', 'quantity'])]
class Cart extends Model
{
    use HasFactory;

    //

}
