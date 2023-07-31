<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }

    public function show($id)
    {
        $reviews = Review::findOrFail($id);
        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'revision_date' => 'required|date',
            'description' => 'required|string',
            'mileage' => 'required|integer',
            'value' => 'required|numeric',
        ]);

        $reviews = Review::create($request->all());
        return response()->json($reviews, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'revision_date' => 'required|date',
            'description' => 'required|string',
            'mileage' => 'required|integer',
            'value' => 'required|numeric',
        ]);

        $reviews = Review::findOrFail($id);
        $reviews->update($request->all());
        return response()->json($reviews, 200);
    }

    public function destroy($id)
    {
        $reviews = Review::findOrFail($id);
        $reviews->delete();
        return response()->json('successfully deleted record', 204);
    }
}
