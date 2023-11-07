@extends('layouts.base')

@section('title', '!')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Chief</h1>
                <p class="card-text">Добро пожаловать&nbsp;<i class="far fa-smile-beam"></i></p>
                <hr>
                @if($recipeCount)
                    <div class="text-center">
                        <a class="btn btn-primary btn-lg mx-auto" href="{{ route('recipes.index') }}" role="button">
                            <i class="fa fa-pizza-slice"></i>&nbsp;Посмотреть все {{$recipeCount}} рецепты
                        </a>
                    </div>
                    <hr>
                    <div class="container">
                        <h2 class="text-center">Рецепт дня</h2>
                        <div id="random-recipe">
                            <h3><a href="{{ route('recipes.show', $todayRecipe->id) }}">{{ $todayRecipe->name }}</a></h3>
                            <div class="row">
                                <div class="tag-list col-md-3">
                                    <div class="tags">
                                        <div class="tag-wrapper text-center">
{{--                                            <div class="tag badge badge-secondary">постное</div>--}}
                                        </div>
                                    </div>
                                </div>
                                <dl class="ingredient-list col-md-9">
                                    @foreach($todayRecipeIngredients as $ingredient)
                                    <dt class="col-sm-12">{{ $ingredient }}</dt>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h2 class="text-center">Недавно добавленные рецепты</h2>
                        <div id="latest-recipes">
                            <ul>
                                @foreach($latestRecipes as $recipe)
                                    <li><a href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <p class="card-text">Ничего не найдено</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
