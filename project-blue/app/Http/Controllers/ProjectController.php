<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('project.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());
        session()->flash('success', 'Registro creado exitosamente.');
        return redirect()->route('Projects.index');
    }

    public function edit(Project $project)
    {
        return view('project.edit', [
            'project' => $project,
        ]);
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        session()->flash('success', 'Registro actualizado exitosamente.');

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        session()->flash('success', 'Registro eliminado exitosamente.');
        return redirect()->route('projects.index');
    }
}
