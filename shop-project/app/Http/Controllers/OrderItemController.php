<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return response()->json(OrderItem::with(['order', 'product'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id'   => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'total_price'=> 'required|numeric|min:0',
        ]);

        return response()->json(OrderItem::create($validated), 201);
    }

    public function show($id)
    {
        return response()->json(OrderItem::with(['order', 'product'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = OrderItem::findOrFail($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        OrderItem::findOrFail($id)->delete();

        return response()->json(['message' => "OrderItem deleted"]);
    }
}
