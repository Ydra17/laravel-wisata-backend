<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('pages.categories.index', ['type_menu' => 'categories'], compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.categories.create', ['type_menu' => 'categories']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.categories.edit', ['type_menu' => 'categories'], compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully');
    }
}
