<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }
    public function show(Request $request)
    {
        $category = Category::where('name',$request->category)->firstOrFail();
        $products = $category->products()->latest()->paginate(12);

        return view('products.index', compact('products'));
    }

    public function categoryView()
    {
        $categories = Category::with(['products' => function ($q) {
            $q->inRandomOrder()->limit(4); // Fetch 4 random products
        }])->get();
        return view('categories.index', compact('categories'));
    }


}
