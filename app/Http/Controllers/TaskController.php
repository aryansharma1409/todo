<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


public function index()
{
    return view('dashboard', [
        'tasks' => Task::all(),
        'activeCount' => Task::where('completed', false)->count(),
        'completedCount' => Task::where('completed', true)->count()
    ]);
}

public function store()
{
    request()->validate([
        'title' => 'required|min:2'
    ]);

    Task::create([
        'title' => request('title'),
        'description' => request('description')
    ]);

    return back();
}

public function update(Task $task)
{
    $task->update([
        'title' => request('title'),
        'description' => request('description')
    ]);

    return back();
}

public function destroy(Task $task)
{
    $task->delete();

    return back();
}

public function toggle(Task $task)
{
    $task->completed = !$task->completed;

    $task->save();

    return redirect('/dashboard');
}

}
