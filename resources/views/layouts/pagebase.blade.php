<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/assets/app-D-sv12UV.css') }}">
    <script src="{{ asset('build/assets/app-BziwsqBe.js') }}"></script>
    <title>TaskManager</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('main')}}">Главная</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Задачи
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Все</a></li>
                            <li><a class="dropdown-item" href="##">В работе</a></li>
                            <li><a class="dropdown-item" href="###">На проверке</a></li>
                            <li><a class="dropdown-item" href="####">Сделать</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Завершено</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Аккаунт</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('logout')}}">Выйти</a>
                    </li>
                </ul>
{{--                <form class="d-flex">--}}
{{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                </form>--}}
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
