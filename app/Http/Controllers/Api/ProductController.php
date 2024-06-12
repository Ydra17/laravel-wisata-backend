<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //index
    public function index(Request $request)
    {
        $products = Product::with('category')->when($request->status, function ($query) use ($request) {
            $query->where('status', 'like', "%{$request->status}%");
        })->orderBy('favorite', 'desc')->get();
        return response()->json(['status' => 'success', 'data' => $products], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'criteria' => 'required',
            'favorite' => 'required',
            'status' => 'required',
            'stock' => 'required',
            ]);
        // dd("masuk");

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

        if ($request->file('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $product->id . '.' . $image->extension());
            $product->image = 'products/' . $product->id . '.' . $image->extension();
            $product->save();
        }

        return response()->json(['status' => 'success', 'data' => $product], 200);
    }

    //show
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['status'=>'error', 'message'=>'Product not found'], 404);
        }
        return response()->json(['status'=>'success', 'data' => $product], 200);
    }

    //update
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['status'=>'error', 'message'=>'Product not found'], 400);
        }

        // dd($request->name);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->criteria = $request->criteria;
        $product->favorite = $request->favorite;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->save();

        // save image
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $product->id . '.' . $image->extension());
            $product->image = 'products/' . $product->id . '.' . $image->extension();
            $product->save();
        }

        return response()->json(['status' => 'success', 'data' => $product], 200);
    }

    // destroy
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['status' => 'error', 'message'=> 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['status' => 'success', 'message' => 'Product deleted'], 200);
    }

}

