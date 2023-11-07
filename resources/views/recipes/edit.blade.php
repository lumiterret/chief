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
                        <input type="text" class="form-control @error('recipe.name') is-invalid @enderror" name="recipe[name]" placeholder="Наименование" aria-label="Наименование" value="{{old('recipe.name') ?? $recipe->name}}">
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
                        @foreach($ingredients as $ingredient)
                            <div class="row input-group mb-3">
                                <div class="col-sm-5 mx-0">
                                   <input type="text" id="recipe_ingredients_0_name" name="recipe[ingredients][{{$ingredient->id}}][name]" class="form-control-sm form-control" placeholder="Название ингредиента" value="{{ $ingredient->name }}">' +
                                    '</div>'+
                                '<div class="col-sm-5 mx-0">'+
                                    '<input type="text" id="recipe_ingredients_0_note" name="recipe[ingredients]['+ i +
                '][note]" placeholder="Заметка" class="form-control-sm form-control" value="">' +
                                    '</div>'+
                                '<div class="col-2">'+
                                    '<button type="button" class="btn btn-danger btn-sm delete-collection-widget ">'+
                                        '<i class="fas fa-minus-circle"></i>&nbsp;'+
                                        '</button>'+
                                    '</div>'+
                                '</div>'
                            {{ $ingredient->name }}
                        @endforeach
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
                        >{{ old('recipe.instructions') ?? $recipe->instructions }}</textarea>
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
