@extends('layouts.base')

@section('title', ' | Рецепты')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Новый рецепт
            </div>
            <div class="card-body">
                <form class="full-width" action="{{ route('recipes.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('recipe.name') is-invalid @enderror" name="recipe[name]" placeholder="Наименование" aria-label="Наименование" value="{{old('recipe.name')}}">
                        @error('recipe.name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-recipe-ingredients col-sm-10">
                        <div class="input-group mb-3">
                            <button type="button"
                                    class="btn btn-primary btn-sm add-collection-widget">
                                <i class="fas fa-plus-circle"></i>&nbsp;Добавить ингредиент
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label" for="instructions">
                            Процесс приготовления
                        </label>
                        <textarea
                            class="form-control @error('recipe.instructions')is-invalid @enderror"
                            name="recipe[instructions]"
                            id="instructions"
                            rows="10"
                        >{{ old('recipe.instructions') }}</textarea>
                        @error('recipe.instructions')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
