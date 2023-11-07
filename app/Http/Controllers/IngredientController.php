<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use App\Models\Recipe;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request)
    {
        $validated = $request->validated();
        $ingredient = new Ingredient($validated);
        $ingredient->save();
        return redirect()->route('ingredients.index', $ingredient->id)
            ->with('success', 'Ингредиент добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        $recipes = $ingredient->recipes()->get();
        return view('ingredients.show', compact('ingredient', 'recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', ['ingredient' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreIngredientRequest $request, Ingredient $ingredient)
    {
        $validated = $request->validated();
        $ingredient->name = $validated['name'];
        $ingredient->description = $validated['description'];
        $ingredient->save();
        return redirect()->route('ingredients.index', $ingredient->id)
            ->with('success', 'Ингредиент изменён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index')
            ->with('success', 'Ингредиент удалён');
    }
}
