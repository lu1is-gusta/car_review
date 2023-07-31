<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        return response()->json($persons);
    }

    public function show($id)
    {
        $persons = Person::findOrFail($id);
        return response()->json($persons);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|in:M,F',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:persons,email',
            'telephone' => 'nullable|string|max:255',
        ]);

        $persons = Person::create($request->all());
        return response()->json($persons, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|in:M,F',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:persons,email,' . $id,
            'telephone' => 'nullable|string|max:255',
        ]);

        $persons = Person::findOrFail($id);
        $persons->update($request->all());
        return response()->json($persons, 200);
    }

    public function destroy($id)
    {
        $persons = Person::findOrFail($id);
        $persons->delete();
        return response()->json('successfully deleted record', 204);
    }
}
