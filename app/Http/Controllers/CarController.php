<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    public function show($id)
    {
        $cars = Car::findOrFail($id);
        return response()->json($cars);
    }

    public function store(Request $request)
    {
        $request->validate([
            'person_id' => 'required|exists:persons,id',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . (date('Y')+1),
            'plate' => 'required|string|max:255|unique:cars',
            'color' => 'required|string|max:255',
        ]);

        $cars = Car::create($request->all());
        return response()->json($cars, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'person_id' => 'required|exists:persons,id',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . (date('Y')+1),
            'plate' => 'required|string|max:255|unique:cars,plate,' . $id,
            'color' => 'required|string|max:255'
        ]);

        $cars = Car::findOrFail($id);
        $cars->update($request->all());
        return response()->json($cars, 200);
    }

    public function destroy($id)
    {
        $cars = Car::findOrFail($id);
        $cars->delete();
        return response()->json('successfully deleted record', 204);
    }
}
