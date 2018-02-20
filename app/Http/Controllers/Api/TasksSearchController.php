<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksSearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $request->validate([
            'searchTerm' => 'required',
        ]);

        $tasks = Task::search($request->searchTerm)->get();
        $tasks->load('creator', 'worker');

        return response()->json(
            $tasks
        );
    }
}
