@extends('layouts.base')

@section('title', ' | Ингредиенты')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                <h5 class="me-auto">{{ $ingredient->name }}</h5>
                <div class="btn-group align-items-end">
                    @if(user())
                    <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Редактировать</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if($ingredient->description)
                    @php
                        $description = explode(PHP_EOL,$ingredient->description)
                    @endphp
                    @foreach($description as $paragraph)
                        <p class="card-text">{{$paragraph}}</p>
                    @endforeach
                @else
                    <p class="card-text">Описание не добавлено</p>
                @endif
                @if(!empty($recipes) && count($recipes))
                    <hr>
                        <h2 class="recipes">
                            <i class="fas fa-pizza-slice"></i>&nbsp;Ингредиент используется в рецептах
                        </h2>

                        <x-recipes.list-table :recipes="$recipes"/>
                @endif
            </div>
        </div>
    </div>

@endsection
