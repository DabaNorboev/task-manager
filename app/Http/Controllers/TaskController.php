<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(TaskRequest $request)
    {
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'deadline' => $request->input('deadline'),
        ]);
        return redirect()->back();
    }

    public function getTasks(TaskRequest $request)
    {

    }
}
