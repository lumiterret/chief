@extends('layouts.base')

@section('title', ' | Ингредиенты')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                <h5 class="me-auto">{{ $ingredient->name }}</h5>
                <div class="btn-group align-items-end">
                    <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Редактировать</a>
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

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th class="text-end" scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recipes as $recipe)
                                <tr>
                                    <td>{{ $recipe->name}}</td>
                                    <td>
                                        <div class="btn-group float-end" role="group">
                                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i>&nbsp;Показать</a>
                                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-square"></i>&nbsp;Редактировать</a>
                                            <a href="{{ route('recipes.destroy', $recipe->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>&nbsp;</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                @endif
            </div>
        </div>
    </div>

@endsection
