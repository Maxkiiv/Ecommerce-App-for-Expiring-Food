<?php

namespace App\Models;

use App\Helpers\ProductCollectionHelper;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Unguarded]
class Product extends Model
{
    use HasFactory;


    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array<int, \Illuminate\Database\Eloquent\Model>  $models
     * @return \Illuminate\Database\Eloquent\Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function newCollection(array $models = []): Collection
    {
        return new ProductCollectionHelper($models);
    }

    /**
     *  =============== RELATIONSHIPS  ===============
     */


    /**
     *  =============== SCOPES  ===============
     */

    #[Scope]
    protected function withPrices(Builder $query, array $group_ids = [1])
    {
        $query->where('products.id', '>', 0);
    }

    #[Scope]
    protected function singleProduct(Builder $query, int $id)
    {
        $query->where('products.id', $id);
    }




    /**
     *  =============== FUNCTIONS  ===============
     */
    public function getImage()
    {
        return asset('storage' . $this->image_path . $this->image_name);
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function getStockPrice()
    {
        return $this->price;
    }


    public function getCartQuantityPrice()
    {
        return $this->getPrice() * $this->pivot->quantity;
    }

    public function getLink()
    {
        return route('shop.details', ['id' => $this->id]);
    }
}
