<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::all(), 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'picture' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);
        $item = Item::create($request->all());
        return response()->json($item, 201);
    }
    public function show($id)
    {
        $item = Item::find($id);
        if (!$item) return response()->json(['message' => 'Item not found'], 404);
        return response()->json($item, 200);
    }
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if (!$item) return response()->json(['message' => 'Item not found'], 404);
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'picture' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $item->update($request->all());
        return response()->json($item, 200);
    }
    public function destroy($id)
    {
        $item = Item::find($id);
        if (!$item) return response()->json(['message' => 'Item not found'], 404);
        $item->delete();
        return response()->json(['message' => 'Item deleted'], 200);
    }
}
