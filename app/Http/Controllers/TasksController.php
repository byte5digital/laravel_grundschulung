<?php

namespace App\Http\Controllers;

use App\Task;
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
        $tasks = Task::all();

        return view('todo', ['tasks' => $tasks]);
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
}
