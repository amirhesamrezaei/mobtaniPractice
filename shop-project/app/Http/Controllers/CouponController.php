<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return response()->json(Coupon::all());
    }

    public function store(Request $request)
    {
        return response()->json(Coupon::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Coupon::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = Coupon::findOrFail($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();

        return response()->json(['message' => "Coupon deleted"]);
    }
}
