<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * @param Task $task
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Task $task, Request $request)
    {
        $task->worker()->associate(\Auth::user());

        $task->fill([
            'done_at' => $request->done ? Carbon::now() : null,
        ])->update();

        return response()->json($task);
    }
}
