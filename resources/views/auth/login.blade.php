@extends('layouts.guest')

@section('main')
    <div>
        <div>
            @if (session('status'))
                <div>>
                    <h5>Внимание!</h5>
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div>
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" placeholder="Пароль">
                    @error('password')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <div>
                        <div>
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Запомнить
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div>
                        <button type="submit">{{__('Log in')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            {{--<a href="{{ route('password.request') }}" class="text-sm font-medium text-green-600 hover:text-green-500">Сбросить пароль?</a><br>
            <a href="{{ route('register') }}" class="text-sm font-medium text-green-600 hover:text-green-500">Зарегистрировать аккаунт</a>--}}
        </div>
    </div>
@endsection
