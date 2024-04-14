<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getRegistration()
    {
        return view("registration");
    }

    public function create(RegistrationRequest $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        dd('complete');
    }

    public function getLogin()
    {
        return view("login");
    }

    public function login(LoginRequest $request)
    {
        dd($request->input('email'));
    }


    public function logout()
    {

    }
}
