<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::when($request->keyword, function($query) use ($request) {
            $query->where('name', 'like', "%{$request->keyword}%")
                ->orWhere('description', 'like', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate(10);
        return view('pages.products.index', ['type_menu' => 'product'], compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('pages.products.create', ['type_menu' => 'product'], compact('categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'criteria' => 'required',
            'favorite' => 'required',
            'status' => 'required',
            'stock' => 'required',
        ]);

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->criteria = $request->criteria;
        $product->favorite = $request->favorite;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->save();


        $image = $request->file('image');
        $image->storeAs('public/products', $product->id . '.' . $image->extension());
        $product->image = 'products/' . $product->id . '.' . $image->extension();
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('pages.products.edit', ['type_menu' => 'product'], compact('product', 'categories'));
    }

    public function update(Product $product, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            // 'image' => 'required',
            'criteria' => 'required',
            'favorite' => 'required',
            'status' => 'required',
            'stock' => 'required',
        ]);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->criteria = $request->criteria;
        $product->favorite = $request->favorite;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->save();

        // if image been updated
        if ($request->image) {
            $image = $request->file('image');
            $image->storeAs('public/products', $product->id . '.' . $image->extension());
            $product->image = 'products/' . $product->id . '.' . $image->extension();
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
