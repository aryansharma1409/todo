<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{


public function index()
{
      $tasks = Auth::user()->tasks;
    return view('dashboard', [
        'tasks' => $tasks,
        'activeCount' => $tasks->where('completed', false)->count(),
        'completedCount' => $tasks->where('completed', true)->count()
    ]);
}

public function store()
{
    request()->validate([
        'title' => 'required|min:2'
    ]);

    Task::create([
        'title' => request('title'),
        'description' => request('description'),
        'due_date' => request('due_date'),
        'user_id' => Auth::id()
    ]);

    return back();
}

public function update(Task $task)
{
    $task->update([
        'title' => request('title'),
        'description' => request('description'),
        'due_date' => request('due_date')
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
