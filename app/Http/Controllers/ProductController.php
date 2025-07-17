<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index(Request $request)
    {
        if($request->has('category')){
            $category= new CategoryController();
           return $category->show($request);
        }
        $products = Product::latest()->paginate(12);
        return view('products.index', compact('products'));
    }

    // Show product detail
    public function show($slug,Product $product)
    {
        return view('products.show', compact('product'));
    }
}
