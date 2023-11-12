@extends('layouts.base')

@section('title', ' | Ingredients')

@section('content')
<div class="container">
            <h2>Ингредиенты</h2>
        <div class="btn-group float-end">
            <a href="{{ route('ingredients.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>&nbsp;Добавить</a>
        </div>
    <x-ingredients.list-table :ingredients="$ingredients"/>
</div>
@endsection
