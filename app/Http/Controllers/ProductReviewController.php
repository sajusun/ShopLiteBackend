<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductRating;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request,Product $product)
    {
        $request->validate([
//            'product_id' => 'required|exists:products,id',
            'review' => 'required|string|max:1000',
        ]);


        ProductReview::create([
            'product_id' => $product->id,
            'user_id' => auth()->id() ?? null,
            'review' => $request->review,
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }
}
