<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use AuthenticatesUsers;

    public function register(RegistrationRequest $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect(route('user.login'));
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])){
            return redirect(route('main'));
        } else {
            return redirect(route('login'))->withErrors(['authError' => 'Введен неправильный e-mail или пароль']);
        }
    }
}
