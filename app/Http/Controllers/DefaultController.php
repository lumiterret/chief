<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        $recipeCount = Recipe::all()->count();
        $todayRecipe = $this->getTodayRecipe();
        $todayRecipeIngredients = [];
        if ($todayRecipe) {
            $todayRecipeIngredients = $todayRecipe->ingredients()->pluck('name');
        }
        $latestRecipes = Recipe::query()->orderBy('created_at')->limit(5)->get();
        return view('index', compact(
            'recipeCount',
            'todayRecipe',
            'todayRecipeIngredients',
            'latestRecipes'
        ));
    }

    public function getTodayRecipe()
    {
        return Recipe::query()->inRandomOrder()->get()->first();
    }
}
