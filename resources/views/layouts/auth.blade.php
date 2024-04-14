
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--@vite(['/resources/css/app.css', '/resources/js/app.js'])--}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-D-sv12UV.css') }}">
    <script src="{{ asset('build/assets/app-BziwsqBe.js') }}"></script>
    <title>TaskManager</title>
</head>
<body>
    <div class="container">
        <h1 class="display-3 text-center mt-5 mb-5">Добро пожаловать в TaskManager</h1>
    </div>
    <div class="container">
        <div class="col-5 mx-auto">
            @yield('content')
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger mt-5 mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
