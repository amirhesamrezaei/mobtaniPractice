<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json(Address::all());
    }

    public function store(Request $request)
    {
        return response()->json(Address::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Address::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = Address::findOrFail($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        Address::findOrFail($id)->delete();

        return response()->json(['message' => "Address deleted"]);
    }
}
