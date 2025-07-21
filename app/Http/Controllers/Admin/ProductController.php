<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index():View
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create():View
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $product = new Product($request->except('image'));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $request->image->getClientOriginalName();
            $image->storeAs('products', $filename, 'public');
            $filename = time() . '_' . $request->image->getClientOriginalName();
          //  Storage::disk('public')->putFileAs('products', $request->file('image'), $filename);
            $product->image = 'products/'.$filename;
        }

        $product->slug = \Str::slug($request->name);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $product->fill($request->except('image'));
       // $user = Auth::user();
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            Storage::disk('public')->putFileAs('products', $request->file('image'), $filename);

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = 'products/'.$filename;
        }

        $product->slug = \Str::slug($request->name);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted!');
    }
}
