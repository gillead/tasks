<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $tasks = Task::where('status', '!=', 1)
            ->orderBy('priority', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(5);
        $daily_tasks = DailyTask::orderBy('id', 'desc')
            ->paginate(10);

        return view('welcome', [
            'tasks' => $tasks,
            'daily_tasks' => $daily_tasks
        ]);
    }
}
