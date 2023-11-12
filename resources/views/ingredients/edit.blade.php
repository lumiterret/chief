@extends('layouts.base')

@section('title', ' | Ингредиенты')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $ingredient->name }}
            </div>
            <div class="card-body">
                <form class="full-width" action="{{ route('ingredients.update', $ingredient->id) }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Наименование" aria-label="Наименование" value="{{ old('name') ?? $ingredient->name }}">
                        @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div><div class="mb-3">
                        <label class="col-form-label" for="description">
                            Описание ингредиента
                        </label>
                        <textarea
                            class="form-control @error('description')is-invalid @enderror markdown"
                            name="description"
                            id="description"
                            rows="10"
                        >{{ old('description') ?? $ingredient->description }}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Сохранить</button>

                </form>
            </div>
        </div>
    </div>
@endsection
