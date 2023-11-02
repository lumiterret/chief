<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controllers\DefaultController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('auth/login', [Controllers\Auth\LoginController::class, 'login'])
        ->name('login');
    Route::post('auth/login', [Controllers\Auth\LoginController::class, 'authenticate'])
        ->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [Controllers\Auth\LoginController::class, 'logout'])
        ->name('logout');


    Route::prefix('ingredients/')->group(function () {
        Route::get('', [Controllers\IngredientController::class, 'index'])
            ->name('ingredients.index');
        Route::post('', [Controllers\IngredientController::class, 'store'])
            ->name('ingredients.store');
        Route::get('create', [Controllers\IngredientController::class, 'create'])
            ->name('ingredients.create');
        Route::get('{ingredient}/show', [Controllers\IngredientController::class, 'show'])
            ->name('ingredients.show');
        Route::get('{ingredient}/edit', [Controllers\IngredientController::class, 'edit'])
            ->name('ingredients.edit');
        Route::post('{ingredient}', [Controllers\IngredientController::class, 'update'])
            ->name('ingredients.update');
        Route::get('{ingredient}/delete', [Controllers\IngredientController::class, 'destroy'])
            ->name('ingredients.destroy');
    });

});
