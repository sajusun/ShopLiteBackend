<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $products = Product::with('category')->latest()->take(8)->get();

        return view('home', compact('categories', 'products'));
    }

}
