<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        $products = Product::with('category')->latest()->take(8)->get();
        $categories = Category::inRandomOrder()->first();

        $productsByCategory = $categories
            ? $categories->products()->inRandomOrder()->limit(4)->get()
            : collect();

        return view('home', compact('categories', 'products', 'productsByCategory'));
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('slug', 'like', "%{$query}%")
            ->paginate(12);

        return view('products.index', compact('products'));
    }

}
