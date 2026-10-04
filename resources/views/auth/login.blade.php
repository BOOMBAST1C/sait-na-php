@extends('layouts.app')

@section('title', 'Вход на сайт')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="text-align: center;">Вход в аккаунт</h2>

        {{-- Вывод ошибок (если логин или пароль неверные) --}}
        @if ($errors->any())
            <div style="background: #fee; color: #c00; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="login" style="display: block; margin-bottom: 5px;">Логин:</label>
                <input type="text" id="login" name="login" value="{{ old('login') }}" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Пароль:</label>
                <input type="password" id="password" name="password" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <button type="submit" style="width: 100%; background: #007bff; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">
                Войти
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 15px;">
            Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a>
        </p>
    </div>
@endsection