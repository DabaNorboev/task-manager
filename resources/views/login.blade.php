@extends('layouts.auth')
@section('content')
    <h2><strong>Войдите в свой аккаунт</strong></h2>
    <form action="{{route('user.login')}}" method="POST">
        @csrf
        <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите e-mail" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" name="password">
        </div>
        @error('authError')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="{{route('registration')}}" class="btn btn-link">Зарегистрироваться</a>
    </form>

@endsection

