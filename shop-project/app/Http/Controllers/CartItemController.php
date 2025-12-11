<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        return response()->json(CartItem::with(['cart', 'product'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cart_id'    => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'unit_price' => 'required|numeric',
            'total_price'=> 'required|numeric'
        ]);

        return response()->json(CartItem::create($validated), 201);
    }

    public function show($id)
    {
        return response()->json(CartItem::with(['cart', 'product'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = CartItem::findOrFail($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        CartItem::findOrFail($id)->delete();

        return response()->json(['message' => "CartItem deleted"]);
    }
}
