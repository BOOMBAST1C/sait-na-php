<header style="background: #333; color: white; padding: 15px;">
    <h1>Мой Новостной Сайт</h1>
    <nav>
        <a href="{{ route('home') }}" style="color: white; margin-right: 15px;">Главная</a>
        <a href="{{ route('category') }}" style="color: white; margin-right: 15px;">Категория</a>
        
        @auth
            {{-- Ссылка "Журналист" видна только Журналистам и Админам --}}
            @if (auth()->user()->isJournalist() || auth()->user()->isAdmin())
                <a href="{{ route('journalist') }}" style="color: white; margin-right: 15px;">Журналист</a>
            @endif

            {{-- Ссылка "Админ" видна только Админам --}}
            @if (auth()->user()->isAdmin())
                <a href="{{ route('admin') }}" style="color: white; margin-right: 15px;">Админ</a>
            @endif
            
            <span style="color: #ffd700; margin-right: 15px;">
                Привет, {{ auth()->user()->login }}! ({{ auth()->user()->role->name }})
            </span>
            
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