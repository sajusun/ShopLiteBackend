<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = SubCategory::latest()->get();
        return view('admin.sub-categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.sub-categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255|unique:sub_categories,name',
            'description' => 'nullable|string'
        ]);

        SubCategory::create($validated);

        return redirect()->route('admin.sub_categories.index')->with('success', 'Sub-Category added!');
    }

    public function edit(SubCategory $subCategory)

    {
      //  dd($subCategory->id);
        $categories = Category::latest()->get();

        return view('admin.sub-categories.edit', compact('categories', 'subCategory'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255|unique:sub_categories,name,' . $subCategory->id,
            'description' => 'nullable|string'
        ]);

        $subCategory->update($validated);

        return redirect()->route('admin.sub_categories.index')->with('success', 'Sub-Category updated!');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return back()->with('success', 'Sub-Category deleted!');
    }
}
