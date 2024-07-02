<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Attachment;
use App\Models\Comment;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function createTask()
    {
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date|date_format:Y-m-d|after_or_equal:tomorrow',
            'file' => 'required|file',


        ]);
        $task = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'deadline' => $data['deadline'],
            'status_id' => 1
        ]);

        UserTask::create([
            'user_id' => Auth::id(),
            'task_id' => $task->id,
        ]);

        $file = $data['file'];
        $path = Storage::disk('local')->put('attachments', $file);
        $name = $file->getClientOriginalName();

        Attachment::create([
            'task_id' => $task->id,
            'name' => $name,
            'attachment_path' => $path,
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->back();
    }
    public function getTask(int $id)
    {
        $statuses = [
            '2' => 'В работе',
            '1' => 'Сделать',
            '3' => 'На проверке',
            '4' => 'Завершено',
            '5' => 'Отменено',
        ];

        $task = Task::with('comments.user')->findOrFail($id);

        $comments = Comment::with('user')
            ->where('task_id', $id)
            ->orderBy('created_at','asc')
            ->get();

        $attachments = Attachment::where('task_id', $id)->get();


        return view('task', ['task' => $task, 'statuses' => $statuses, 'comments' => $comments, 'attachments' => $attachments]);
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

        $attachments = Attachment::where('task_id', $id)->get();

        return view('task_edit', ['task' => $task, 'statuses' => $statuses, 'attachments' => $attachments]);
    }

    public function create(TaskRequest $request)
    {
        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
            'status_id' => 1,
        ]);

        UserTask::create([
            'task_id' => $task->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }


    public function update(int $id, TaskRequest $request)
    {
        $statusId = $request->input('status_id');
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
