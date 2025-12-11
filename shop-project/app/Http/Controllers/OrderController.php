<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['user', 'items', 'payment'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'         => 'required|exists:users,id',
            'status'          => 'nullable|string',
            'total_amount'    => 'required|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'payment_status'  => 'nullable|string',
        ]);

        return response()->json(Order::create($validated), 201);
    }

    public function show($id)
    {
        return response()->json(Order::with(['user', 'items', 'payment'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status'          => 'nullable|string',
            'total_amount'    => 'nullable|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'payment_status'  => 'nullable|string',
        ]);

        $order->update($validated);

        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();

        return response()->json(['message' => "Order deleted"]);
    }
}
