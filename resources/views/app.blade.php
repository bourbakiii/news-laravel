<!-- app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Мой проект</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

        <nav class="navigation-wrapper">
            <div class="navigation">
                <a class="navigation__logo" href="/">Новости</a>
                @auth
                    <div class="navigation__links">
                        <li class="navigation__item">
                             <a class="navigation__link" href="/">Все посты</a>
                        </li>
                        
                        <li class="navigation__item">
                            <a class="navigation__link" href="/favorites">Избранное</a>
                        </li>

                            <form class="navigation__form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="red navigation__button">Выход</button>
                            </form>
            </div>
                @else
                        <div class="navigation__links">
                        
                                                <li class="navigation__item">

                             <a class="navigation__link" href="{{ route('login') }}">Вход</a>
                        </li>
                                                <li class="navigation__item">

                             <a class="navigation__link" href="{{ route('register') }}">Регистрация</a>
                        </li>
            </div>
                @endauth
            </div>
        </nav>

    <main class="page-container">
        @yield('content')
    </main>
</body>
</html>