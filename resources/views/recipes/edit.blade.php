@extends('layouts.base')

@section('title', ' | Рецепты')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Редактирование рецепта
            </div>
            <div class="card-body">
                <h1>{{$recipe->name }}</h1>
                <form class="full-width" action="{{ route('recipes.update', $recipe->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="recipeName" class="form-label">Название рецепта:</label>
                        <input type="text" id="recipeName" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Наименование" aria-label="Наименование" value="{{old('name') ?? $recipe->name }}" required>
                        @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ингредиенты:</label>
                        <div id="ingredients" class="col-8">
                            @foreach($recipe->ingredients as $ingredient)
                                <div class="ingredient-input input-group mb-2">
                                    <input type="text" name="ingredients[{{ $loop->index }}][name]" class="form-control mt-1" placeholder="Наименование" value="{{ $ingredient->name }}" required="">
                                    <input type="text" name="ingredients[{{ $loop->index }}][notes]" class="form-control mt-1" placeholder="Заметки" value="{{ $ingredient->pivot->note }}">
                                    <button type="button" class="btn btn-danger mt-1"><i class="fa-solid fa-trash-can"></i>&nbsp;Remove</button></div>
                            @endforeach
                            <!-- Ingredient inputs will be added here dynamically -->
                        </div>
                        <button type="button" id="addIngredientButton" class="btn btn-primary">Добавить Ингредиент</button>
                        @error('ingredients')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="instructions">
                            Процесс приготовления
                        </label>
                        <textarea
                            class="form-control @error('instructions')is-invalid @enderror markdown"
                            name="instructions"
                            id="instructions"
                            rows="10"
                        >{{ old('instructions') ?? $recipe->instructions }}</textarea>
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
