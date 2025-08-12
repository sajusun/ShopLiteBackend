<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'price', 'stock', 'image', 'category_id','sub_category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
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
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Boot method for model events
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($products) {
            if (empty($products->slug)) {
                $products->slug = static::generateUniqueSlug($products->name);
            }
        });
    }

    // Generate unique slug
    public static function generateUniqueSlug($name): string
    {
        $slug = Str::slug($name).'-'.Str::random(5);
        $originalSlug = $slug;

        while (DB::table('products')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . Str::random(9);
        }

        return $slug;
    }
}
