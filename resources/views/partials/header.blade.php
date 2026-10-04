<header style="background: #333; color: white; padding: 15px;">
    <h1>Мой Новостной Сайт</h1>
    <nav>
        <a href="{{ route('home') }}" style="color: white; margin-right: 15px;">Главная</a>
        <a href="{{ route('category') }}" style="color: white; margin-right: 15px;">Категория (IT)</a>
        
        {{-- Проверяем, авторизован ли пользователь --}}
        @auth
            <a href="{{ route('journalist') }}" style="color: white; margin-right: 15px;">Журналист</a>
            <a href="{{ route('admin') }}" style="color: white; margin-right: 15px;">Админ</a>
            
            <span style="color: #ffd700; margin-right: 15px;">Привет, {{ Auth::user()->login }}!</span>
            
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: 1px solid white; color: white; padding: 5px 10px; border-radius: 4px; cursor: pointer;">
                    Выйти
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" style="color: white; margin-right: 15px;">Войти</a>
            <a href="{{ route('register') }}" style="color: white;">Регистрация</a>
        @endauth
    </nav>
    <hr>
</header>