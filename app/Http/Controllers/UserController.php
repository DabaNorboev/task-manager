<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class UserController extends Controller
{
    public function getRegistration()
    {
        $user = User::find(1);
        dd($user->email);
//        return view("registration");
    }

    public function create(RegistrationRequest $request)
    {

    }

    public function getLogin()
    {
        return view("login");
    }


    public function logout()
    {
    }
}
