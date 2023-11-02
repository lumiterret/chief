@extends('layouts.base')

@section('title', ' | Ингредиенты')

@section('content')
<div class="container">
            <h2>Ингредиенты</h2>
        <div class="btn-group float-end">
            <a href="{{ route('ingredients.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>&nbsp;Добавить</a>
        </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th class="text-end" scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($ingredients) && count($ingredients))
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name}}</td>
                    <td>
                        <div class="btn-group float-end" role="group">
                            <a href="{{ route('ingredients.show', $ingredient->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i>&nbsp;Показать</a>
                            <a href="{{ route('ingredients.destroy', $ingredient->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>&nbsp;</a>
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
