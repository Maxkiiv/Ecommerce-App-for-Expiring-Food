<?php

namespace App\Models;

use App\Models\Group;
use App\Models\ShippingOption;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Table('shipping')]
#[Unguarded]
class Shipping extends Model
{
    use HasFactory;


    /**
     * The groups that belong to the Shipping
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'shipping_options')
            ->withPivot('id', 'status')
            ->withTimestamps()
        ;
    }


    /**
     * Get all of the shipping_options for the Shipping
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipping_options(): HasMany
    {
        return $this->hasMany(ShippingOption::class, 'shipping_id', 'id');
    }
}
