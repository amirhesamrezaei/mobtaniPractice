<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return response()->json(Cart::with('user', 'items')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status'  => 'nullable|string'
        ]);

        return response()->json(Cart::create($validated), 201);
    }

    public function show($id)
    {
        return response()->json(Cart::with('items')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());

        return response()->json($cart);
    }

    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();

        return response()->json(['message' => "Cart deleted"]);
    }
}
