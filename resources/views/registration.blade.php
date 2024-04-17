@extends('layouts.auth')
@section('content')
    <h2><strong>Создайте свой аккаунт</strong></h2>
    <form class="row g-3" action="{{route('user.registration')}}" method="post">
        @csrf
        <div class="col-12">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="ivan@example.com" value="{{old('email')}}">
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Иванов Иван" value="{{old('name')}}">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль">
            @error('password')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Введите пароль еще раз">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <a href="{{route('login')}}" class="btn btn-link">У меня уже есть аккаунт</a>
        </div>
    </form>
@endsection

