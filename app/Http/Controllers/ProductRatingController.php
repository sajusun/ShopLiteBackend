<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Update existing rating or create new
        ProductRating::updateOrCreate(
            ['product_id' => $request->product_id, 'user_id' => auth()->id()],
            ['rating' => $request->rating]
        );

        return back()->with('success', 'Rating submitted successfully.');
    }
}
