<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainRequest;
use App\Models\Status;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getMain(MainRequest $request)
    {
        $selectedStatus = $request->input('status');

        $taskIds = UserTask::where('user_id', Auth::id())->select('task_id')->get();

        if ($selectedStatus == '0') {
            $tasks = Task::whereIn('id', $taskIds)->get();
        } else {
            $tasks = Task::whereIn('id', $taskIds)->where('status_id','=',$selectedStatus)->get();
        }

        $statuses = [
            '0' => 'Все',
            '1' => 'Сделать',
            '2' => 'В работе',
            '3' => 'На проверке',
            '4' => 'Завершено',
            '5' => 'Отменено',
        ];

        return view('main', ['tasks' => $tasks, 'statuses' => $statuses, 'selectedStatus' => $selectedStatus]);
    }
}
