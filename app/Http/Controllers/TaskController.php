<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function getTask(int $id)
    {
        $task = Task::findOrFail($id);

        $statusTranslations = [
            'in_progress' => 'В работе',
            'to_do' => 'Сделать',
            'review' => 'На проверке',
            'done' => 'Завершено',
            'canceled' => 'Отменено',
        ];

        return view('task', ['task' => $task, 'statusTranslations' => $statusTranslations]);
    }

    public function create(TaskRequest $request)
    {
        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'deadline' => $request->input('deadline'),
        ]);

        UserTask::create([
            'task_id' => $task->id,
            'user_id' => Auth::id(),
        ]);
        return redirect()->back();
    }

    public function update(int $id, TaskRequest $request)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->back();
    }

}
