@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="text-align: center;">Регистрация</h2>

        @if ($errors->any())
            <div style="background: #fee; color: #c00; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
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

            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px;">Подтверждение пароля:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <button type="submit" style="width: 100%; background: #28a745; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">
                Зарегистрироваться
            </button>
        </form>

        <p style="text-align: center; margin-top: 15px;">
            Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a>
        </p>
    </div>
@endsection