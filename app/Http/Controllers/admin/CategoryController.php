<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['subcategories' => function ($query) {
            $query->where('is_deleted', 0);
        }])
            ->where('is_deleted', 0)
            ->latest()
            ->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'        => 'required|in:category,subcategory',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active'   => 'required|boolean',
            'parent_id'   => 'required_if:type,subcategory|nullable|exists:categories,id',
            'lead_price'   => 'required_if:type,category',
        ]);

        if ($request->type === 'category') {
            Category::create([
                'name'        => $request->name,
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'is_active'   => $request->is_active,
                'lead_price'   => $request->lead_price,
            ]);
        } else {
            SubCategory::create([
                'category_id' => $request->parent_id,
                'name'        => $request->name,
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'is_active'   => $request->is_active,
            ]);
        }

        return redirect()->route('admin.manage.category')->with('success', 'Saved successfully!');
    }

    public function show($type, $id)
    {
        if ($type === 'category') {
            $category = Category::findOrFail(FakerURL::id_d($id));
            return view('admin.category.show', compact('category'));
        } elseif ($type === 'subcategory') {
            $subcategory = SubCategory::with('category')->findOrFail(FakerURL::id_d($id));
            return view('admin.category.show', compact('subcategory'));
        }

        abort(404);
    }

    public function edit($type, $id)
    {
        $categories = Category::where('is_active', 1)->get();

        if ($type === 'category') {
            $category = Category::findOrFail(FakerURL::id_d($id));
            return view('admin.category.edit', compact('category'));
        } elseif ($type === 'subcategory') {
            $subcategory = SubCategory::with('category')->findOrFail(FakerURL::id_d($id));
            return view('admin.category.edit', compact('subcategory', 'categories'));
        }

        abort(404);
    }

    public function update(Request $request, $type, $id)
    {

        if ($type === 'category') {
            $category = Category::findOrFail(FakerURL::id_d($id));

            $request->validate([
                'name'        => 'required|string|max:255|unique:categories,name,' . $category->id,
                'description' => 'nullable|string',
                'is_active'   => 'required|boolean',
                'lead_price'   => 'required',
            ]);

            $category->update([
                'name'        => $request->name,
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'is_active'   => $request->is_active,
                'lead_price'   => $request->lead_price,
            ]);
        } elseif ($type === 'subcategory') {
            $subcategory = SubCategory::findOrFail(FakerURL::id_d($id));

            $request->validate([
                'name'        => 'required|string|max:255|unique:sub_categories,name,' . $subcategory->id,
                'description' => 'nullable|string',
                'is_active'   => 'required|boolean',
                'category_id' => 'required|exists:categories,id',
            ]);

            $subcategory->update([
                'category_id' => $request->category_id,
                'name'        => $request->name,
                'slug'        => Str::slug($request->name),
                'description' => $request->description,
                'is_active'   => $request->is_active,
            ]);
        } else {
            abort(404);
        }

        return redirect()->route('admin.manage.category')->with('success', 'Updated successfully!');
    }

    public function destroy($type, $id)
    {
        if ($type === 'category') {
            $category = Category::findOrFail(FakerURL::id_d($id));
            $category->update(['is_deleted' => 1]);
        } elseif ($type === 'subcategory') {
            $subcategory = SubCategory::findOrFail(FakerURL::id_d($id));
            $subcategory->update(['is_deleted' => 1]);
        } else {
            abort(404);
        }

        return redirect()->route('admin.manage.category')
            ->with('success', 'Deleted successfully!');
    }


}
