<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Database\Seeders\SubCategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index():View
    {
        $products = Product::latest()->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create():View
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories','sub_categories','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'brand_id'    => 'nullable|exists:brands,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);
       // dd($request->brand_id);
        $product = new Product($request->except('image'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $request->image->getClientOriginalName();
            $image->storeAs('products', $filename, 'public');
            $filename = time() . '_' . $request->image->getClientOriginalName();
          //  Storage::disk('public')->putFileAs('products', $request->file('image'), $filename);
            $product->image = 'products/'.$filename;
        }

        //$product->slug = \Str::slug($request->name);
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product added!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $brands = Brand::all();

        return view('admin.products.edit', compact('product', 'categories','sub_categories','brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'brand_id'    => 'nullable|exists:brands,id',
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

       //$product->slug = Str::slug($request->name);
        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted!');
    }
}
