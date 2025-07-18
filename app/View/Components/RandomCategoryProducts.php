<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class RandomCategoryProducts extends Component
{
    public $category;
    public $products;

    public function __construct()
    {
        // Cache the random category and its products for 1 hour
        $data = Cache::remember('random_category_products', 600, function () {
            $category = Category::inRandomOrder()->first();

            if ($category) {
                $products = $category->products()->inRandomOrder()->limit(4)->get();
                return compact('category', 'products');
            }

            return ['category' => null, 'products' => collect()];
        });

        $this->category = $data['category'];
        $this->products = $data['products'];
    }

    public function render(): View|Closure|string
    {
        return view('components.random-category-products');
    }
}
