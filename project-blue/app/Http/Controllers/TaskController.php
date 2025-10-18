<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')->get();
        return view('task.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $projects = Project::all();   
        return view('task.create', compact('projects'));
    }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());
        session()->flash('success', "Tarea creada exitosamente.");
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('task.edit', [
            'task' => $task,
            'projects' => $projects
        ]);
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        session()->flash('success', 'Tarea actualizada correctamente.');
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
