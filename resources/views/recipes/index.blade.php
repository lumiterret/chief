@extends('layouts.base')

@section('title', ' | Рецепты')

@section('content')
    <div class="container">
        <h2>Рецепты</h2>
        @if(user())
        <div class="btn-group float-end">
            <a href="{{ route('recipes.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>&nbsp;Добавить</a>
        </div>
        @endif
        <x-recipes.list-table :recipes="$recipes"/>
    </div>
@endsection
