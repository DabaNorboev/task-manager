<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Comment;
use App\Models\Status;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function getTask(int $id)
    {
        $task = Task::findOrFail($id);

        $statuses = [
            '2' => 'В работе',
            '1' => 'Сделать',
            '3' => 'На проверке',
            '4' => 'Завершено',
            '5' => 'Отменено',
        ];

        $comments = Comment::with('user')
            ->where('task_id', $id)
            ->orderBy('created_at','asc')
            ->get();



        return view('task', ['task' => $task, 'statuses' => $statuses, 'comments' => $comments]);
    }

    public function getUpdateForm(int $id)
    {
        $task = Task::findOrFail($id);

        $statuses = [
            '2' => 'В работе',
            '1' => 'Сделать',
            '3' => 'На проверке',
            '4' => 'Завершено',
            '5' => 'Отменено',
        ];

        return view('task_edit', ['task' => $task, 'statuses' => $statuses]);
    }

    public function create(TaskRequest $request)
    {
        if ($request->hasFile('attachment')) {

            $file = $request->file('attachment');

            if ($file->isValid()) {

                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

                $path = Storage::disk('local')->putFileAs('attachments', $file, $fileName);

                $task = Task::create([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'deadline' => $request->input('deadline'),
                    'attachment' => $path,
                ]);

                UserTask::create([
                    'task_id' => $task->id,
                    'user_id' => Auth::id(),
                ]);

                return redirect()->back(['filename' => $fileName]);
            }
        } else {
            $task = Task::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'deadline' => $request->input('deadline'),
            ]);

            // Связываем задачу с пользователем
            UserTask::create([
                'task_id' => $task->id,
                'user_id' => Auth::id(),
            ]);
            return redirect()->back();
        }
    }


    public function update(int $id, TaskRequest $request)
    {
        $statusId = $request->input('status');
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status_id' => $statusId,
            'deadline' => $request->input('deadline'),
        ]);

        return redirect()->route('task', ['id' => $id]);
    }

}
