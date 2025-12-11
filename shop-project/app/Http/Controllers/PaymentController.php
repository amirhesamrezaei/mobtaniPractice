<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::with('order')->get());
    }

    public function store(Request $request)
    {
        return response()->json(Payment::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Payment::with('order')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = Payment::findOrFail($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        Payment::findOrFail($id)->delete();

        return response()->json(['message' => "Payment deleted"]);
    }
}
