<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        // Example subcategories for each category
        $subcategories = [
            'Electronics' => ['Mobiles', 'Laptops', 'Headphones', 'Cameras'],
            'Fashion'     => ['Men Shoes', 'Women Shoes', 'Men T-Shirts', 'Women Dresses'],
            'Home & Kitchen' => ['Furniture', 'Kitchen Appliances', 'Decor', 'Lighting'],
        ];

        foreach ($subcategories as $categoryName => $subs) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($subs as $subName) {
                    Subcategory::create([
                        'category_id' => $category->id,
                        'name'        => $subName,
                        'description' => "All kinds of {$subName}",
                        // Slug will auto-generate from model boot method
                    ]);
                }
            }
        }
    }
}


