<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Show the view with all tasks and form to save tasks.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::where('done_at', null)->get();
        $finishedTasks = Task::finished()->get(); // whereNotNull('done_at')

        return view('todo', ['tasks' => $tasks, 'finishedTasks' => $finishedTasks]);
    }

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

        Task::create([
            'subject' => $attributes['subject'],
        ]);

        return redirect()->route('tasks');
    }

    /**
     * @param Task $task
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Task $task, Request $request)
    {
        $task->fill([
            'done_at' => $request->done ? Carbon::now() : null,
        ])->update();

        return redirect()->route('tasks');
    }
}
