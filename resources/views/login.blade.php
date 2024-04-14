@extends('layouts.auth')
@section('content')
    <h2><strong>Войдите в свой аккаунт</strong></h2>
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="{{route('user.registration')}}" class="btn btn-link">Зарегистрироваться</a>
    </form>
@endsection
{{--{{route('user.registration.post')}}--}}
