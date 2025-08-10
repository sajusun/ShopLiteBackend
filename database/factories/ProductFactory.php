<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition(): array
    {
        $categories = Category::pluck('id', 'name')->toArray();
        $sub_categories = Category::pluck('id', 'name')->toArray();
        $categoryName = $this->faker->randomElement(array_keys($categories));
        $sub_categoryName = $this->faker->randomElement(array_keys($sub_categories));
        $productName = $categoryName . ' ' . $this->faker->randomElement([
                'Shirt', 'Pant', 'Dress', 'Hoodie', 'Crop Top', 'Shoes',
            ]);
//        $slug = Str::slug($productName) . '-' . Str::random(5);
        return [
            'name' => $productName,
//            'slug' => $slug,
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'image' => 'products/' . $this->faker->numberBetween(1, 20) . '.jpg',
            'stock' => $this->faker->numberBetween(5, 50),
            'category_id' => $categories[$categoryName] ?? 1,
            'sub_category_id' => $sub_categories[$sub_categoryName] ?? 1,
        ];
    }
}
