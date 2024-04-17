<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getMain()
    {
        $user = Auth::user();

        if ($user) {
            $tasks = $user->userTasks()->with('task')->get();

            return view('main', ['tasks' => $tasks]);
        } else {
            return redirect()->route('login');
        }
    }


}
