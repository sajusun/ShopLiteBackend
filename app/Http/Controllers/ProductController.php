<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index(Request $request)
    {
        if($request->has('q')){
            $shopController= new ShopController();
           return $shopController->search($request);
        }
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
        $product->increment('visits');
        $averageRating = $product->averageRating();
        // Paginate reviews (5 per page)
        $reviews = ProductReview::where('product_id', $product->id)->latest()->paginate(5);

        $averageRating = $product->ratings()->avg('rating');
        $totalRatings = $product->ratings()->count();

        return view('products.show',
            compact('product', 'averageRating', 'totalRatings','reviews'));
    }
}
