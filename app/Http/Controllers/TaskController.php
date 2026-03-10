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
    if(!Auth::user())
        {
            abort(404);
        }
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

    return redirect('/tasks')->with('success', 'Task created successfully!');
}

public function update(Task $task)
{
    $task->update([
        'title' => request('title'),
        'description' => request('description'),
        'due_date' => request('due_date')
    ]);

    return redirect('/tasks')->with('success', 'Task updated successfully!');
}

public function destroy(Task $task)
{
    $task->delete();

    return redirect('/tasks')->with('success', 'Task deleted successfully!');
}

public function toggle(Task $task)
{
    $task->completed = !$task->completed;

    $task->save();

    return redirect('/dashboard');
}

}
