@extends('layouts.base')

@section('title', ' | Ингредиенты')

@section('content')
<div class="container">
    <h2>Ингредиенты</h2>
    @if(user())
        <div class="btn-group float-end">
            <a href="{{ route('ingredients.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i>&nbsp;Добавить</a>
        </div>
    @endif
    <x-ingredients.list-table :ingredients="$ingredients"/>
</div>
@endsection
