<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Home & Kitchen',
            'Children',
            'Accessories',
            'Shoes',
            'Jackets',
            'Electronics',
            'Fashion'
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate([
                'name' => $name,
                'description' => "All kinds of {$name}"
                ]);
        }
    }
}

