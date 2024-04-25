<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainRequest;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function getMain(MainRequest $request)
    {

        $user = Auth::user();

        if ($user) {
            $selectedStatus = $request->input('status');

            $taskIds = UserTask::where('user_id', Auth::id())->select('task_id')->get();

            if ($selectedStatus == 'all') {
                $tasks = Task::whereIn('id', $taskIds)->get();
            }
            else {
                $tasks = Task::whereIn('id', $taskIds)->where('status', $selectedStatus)->get();
            }

            $statusTranslations = [
                'all' => 'Все',
                'in_progress' => 'В работе',
                'to_do' => 'Сделать',
                'review' => 'На проверке',
                'done' => 'Завершено',
                'canceled' => 'Отменено',
            ];

            return view('main', ['tasks' => $tasks, 'statusTranslations' => $statusTranslations, 'selectedStatus' => $selectedStatus]);
        } else {
            return redirect()->route('login');
        }
    }


}
