@extends('layouts.base')

@section('title', ' | Рецепты')

@section('content')
    <div class="container">
        <h2>Рецепты</h2>
        <div class="btn-group float-end">
            <a href="{{ route('recipes.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>&nbsp;Добавить</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th class="text-end" scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($recipes) && count($recipes))
                @foreach($recipes as $recipe)
                    <tr>
                        <td>{{ $recipe->name}}</td>
                        <td>
                            <div class="btn-group float-end" role="group">
                                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i>&nbsp;Показать</a>
                                <a href="{{ route('recipes.destroy', $recipe->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>&nbsp;</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2">
                        Ничего не найдено
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
