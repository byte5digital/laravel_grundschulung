<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * Saves a task.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'subject' => 'required|min:5',
        ]);

        $task = new Task([
            'subject' => $attributes['subject'],
        ]);
        $task->creator()->associate(\Auth::user());
        $task->save();

        \SearchIndex::upsertToIndex($task);

        return response()->json($task);
    }

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
