<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Ingredient;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request)
    {
        $validated = $request->validated();
        $recipe = new Recipe($validated);
        $recipe->save();
        foreach ($validated['ingredients'] as $recipeIngredient) {
            $ingredient = Ingredient::firstOrCreate(['name'=> $recipeIngredient['name']]);
            $recipe->ingredients()->attach($ingredient->id, ['note' => $recipeIngredient['notes']]);
        }

        $ingredients = $recipe->ingredients()->get();
        return response()->view('recipes.show', compact('recipe', 'ingredients'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $ingredients = $recipe->ingredients()->get();
        return response()->view('recipes.show', compact('recipe', 'ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $ingredients = $recipe->ingredients()->get();
        return response()->view('recipes.edit', compact('recipe', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRecipeRequest $request, Recipe $recipe)
    {
        $validated = $request->validated();
        $recipe->fill($validated)->save();

        $ingredientIdsWithPivotData = [];
        foreach ($validated['ingredients'] as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['name' => $ingredientData['name']]);

            $ingredientIdsWithPivotData[$ingredient->id] = ['note' => $ingredientData['notes'] ?? null];
        }

        $recipe->ingredients()->sync($ingredientIdsWithPivotData);

        $ingredients = $recipe->ingredients()->get();
        return response()->view('recipes.show', compact('recipe', 'ingredients'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Рецепт удалён');
    }
}
