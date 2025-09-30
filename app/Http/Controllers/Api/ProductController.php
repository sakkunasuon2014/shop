<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(), 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'category_id' => 'required|integer',
        ]);
        $prod = Product::create($request->all());
        return response()->json($prod, 201);
    }
    public function show($id)
    {
        $prod = Product::find($id);
        if (!$prod) return response()->json(['message' => 'Product not found'], 404);
        return response()->json($prod, 200);
    }
    public function update(Request $request, $id)
    {
        $prod = Product::find($id);
        if (!$prod) return response()->json(['message' => 'Product not found'], 404);
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'category_id' => 'required|integer',
        ]);
        $prod->update($request->all());
        return response()->json($prod, 200);
    }
    public function destroy($id)
    {
        $prod = Product::find($id);
        if (!$prod) return response()->json(['message' => 'Product not found'], 404);
        $prod->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
