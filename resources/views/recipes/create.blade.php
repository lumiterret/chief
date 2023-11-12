@extends('layouts.base')

@section('title', ' | Рецепты')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Добавление рецепта
            </div>
            <div class="card-body">
                <h1>Новый рецепт</h1>
                <form id="recipeForm" action="{{ route('recipes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="recipeName" class="form-label">Название рецепта:</label>
                        <input type="text" id="recipeName" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Наименование" aria-label="Наименование" value="{{old('name')}}" required>
                        @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ингредиенты:</label>
                        <div id="ingredients" class="col-8">
                            <!-- Ingredient inputs will be added here dynamically -->
                        </div>
                        <button type="button" id="addIngredientButton" class="btn btn-primary">Добавить Ингредиент</button>
                        @error('ingredients')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="instructions" class="form-label">Процесс приготовления:</label>
                        <textarea id="instructions"
                                  class="form-control @error('instructions')is-invalid @enderror"
                                  name="instructions"
                                  id="instructions"
                                  rows="10"
                                  required
                        >{{ old('instructions') }}</textarea>
                        @error('instructions')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
