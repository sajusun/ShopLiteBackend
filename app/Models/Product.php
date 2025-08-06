<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'price', 'stock', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function ratings() {
        return $this->hasMany(ProductRating::class);
    }

    public function reviews() {
        return $this->hasMany(ProductReview::class);
    }

    public function averageRating() {
        return $this->ratings()->avg('rating');
    }
}
