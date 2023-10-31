@extends('layouts.guest')

@section('main')
    <main class="form-signin w-100 m-auto">
        <form method="post" action="{{ route('login') }}">
            @csrf
{{--            <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">--}}
            <h1 class="h3 mb-3 fw-normal">Вход</h1>

            <div class="form-floating">
                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="Пароль">
                <label for="password">Password</label>
                @error('password')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Запомнить
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">
                {{__('Log in')}}
            </button>
        </form>
        {{--<a href="{{ route('password.request') }}" class="text-sm font-medium text-green-600 hover:text-green-500">Сбросить пароль?</a><br>
                <a href="{{ route('register') }}" class="text-sm font-medium text-green-600 hover:text-green-500">Зарегистрировать аккаунт</a>--}}
    </main>
@endsection
