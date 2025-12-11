<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::with(['user', 'product'])->get());
    }

    
    public function store(Request $request)
    {
        return response()->json(Review::create($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json(Review::with(['user', 'product'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $item = Review::findOrFail($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();

        return response()->json(['message' => "Review deleted"]);
    }
}
