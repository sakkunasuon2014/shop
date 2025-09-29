<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator; // For validation
use App\Models\Category; // Assuming you have a Category model
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index')->with('products', $product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return view('product.create')->with('categories', $categories);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'category_id' => 'required|integer',
            'price' => 'required|max:20|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'description' => 'required|max:1000|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('product/create')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The product
        $image = $request->file('image');
        $upload = 'img/';
        $extension = substr($image->getClientOriginalName(), -4);
        $filename = substr($image->getClientOriginalName(), 0, -4) . time() . $extension;
        move_uploaded_file($image->getPathName(), $upload . $filename);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->image = $filename;
        $product->description = $request->description;
        $product->save();
        Session::flash('product_create', 'New data is created.');
        return redirect('product/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return view('product.edit')->with('product', $product)->with('categories', $categories);
    }
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'category_id' => 'required|integer',
            'price' => 'required|max:20|min:3',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'description' => 'required|max:1000|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('product/' . $product->id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }
        // Create The Post
        if ($request->file('image') != "") {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            move_uploaded_file($image->getPathName(), $upload . $filename);
        }

        $product->name = $request->Input('name');
        $product->category_id = $request->Input('category_id');
        $product->price = $request->Input('price');
        if (isset($filename)) {
            $product->image = $filename;
        }

        $product->description = $request->Input('description');
        $product->save();

        Session::flash('product_update', 'Data is updated');
        return redirect('product/' . $product->id . '/edit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $image_path = 'img/' . $product->image;
        File::delete($image_path);
        $product->delete();
        Session::flash('product_delete', 'Data is deleted.');
        return redirect('product');
    }
}
