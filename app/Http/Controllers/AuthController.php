<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Показать страницу входа
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Обработать вход
    public function login(Request $request)
    {
        // Проверяем, что поля заполнены
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        // Пытаемся авторизовать пользователя
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // Защита от фиксации сессии
            return redirect()->intended('/')->with('success', 'Вы успешно вошли!');
        }

        // Если не получилось
        return back()->withErrors([
            'login' => 'Неверный логин или пароль.',
        ])->onlyInput('login');
    }

    // 3. Показать страницу регистрации
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // 4. Обработать регистрацию
    public function register(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'login' => ['required', 'string', 'max:50', 'unique:users,login'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // Создаем пользователя. 
        // Благодаря касту 'hashed' в модели User, пароль зашифруется автоматически!
        $user = User::create([
            'login' => $validated['login'],
            'password' => $validated['password'],
        ]);

        // Сразу входим в аккаунт после регистрации
        Auth::login($user);

        return redirect('/')->with('success', 'Регистрация прошла успешно!');
    }

    // 5. Выход из аккаунта
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Вы вышли из аккаунта.');
    }
}