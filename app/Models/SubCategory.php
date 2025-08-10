<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description'
    ];

    // Relation: Subcategory belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation: Subcategory has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // Boot method for model events
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($subcategory) {
            if (empty($subcategory->slug)) {
                $subcategory->slug = static::generateUniqueSlug($subcategory->name);
            }
        });
    }

    // Generate unique slug
    public static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (DB::table('sub_categories')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
