@extends('layouts.base')

@section('title', ' | Рецепты')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                <h1 class="me-auto"><i class="fas fa-pizza-slice"></i>&nbsp;{{ $recipe->name }}</h1>
                <div class="btn-group align-items-end">
                    @if(user())<a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Редактировать</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <h2>Ингредиенты</h2>
                <dl class="row ingredient-list">
                    @foreach ($ingredients as $ingredient)
                    <dt class="col-sm-4">
                        <a href="{{ route('ingredients.show', $ingredient->id) }}">{{$ingredient->name}}</a>
                    </dt>
                    <dd class="col-sm-8">
                        <span class="ingredient-note">{{$ingredient->pivot->note}}</span>
                    </dd>
                    @endforeach
                </dl>
                <hr>
                <h2>Процесс приготовления</h2>
                <div class="container instructions-wrapper">
                    @markdown{{ $recipe->instructions }}@endmarkdown
                </div>
            </div>
        </div>
    </div>
@endsection
