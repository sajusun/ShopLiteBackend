<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static inRandomOrder()
 */
class Category extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function randomProductImage()
    {
        return $this->products()->inRandomOrder()->value('image');
    }

}
