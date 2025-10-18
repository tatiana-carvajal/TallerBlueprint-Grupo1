<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project_userStoreRequest;
use App\Http\Requests\Project_userUpdateRequest;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;

class Project_userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectUsers = ProjectUser::with(['project', 'user'])->get();
        return view('projectUser.index', compact('projectUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('projectUser.create', compact('projects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Project_userStoreRequest $request)
    {
        ProjectUser::create($request->validated());
        session()->flash('success', 'Asignación creada exitosamente');
        return redirect()->route('project-users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectUser $projectUser)
    {
        $projects = Project::all();
        $users = User::all();
        return view('projectUser.edit', compact('projectUser', 'projects', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Project_userUpdateRequest $request, ProjectUser $projectUser)
    {
        $projectUser->update($request->validated());
        session()->flash('success', 'Asignación actualizada correctamente');
        return redirect()->route('project-users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectUser $projectUser)
    {
        $projectUser->delete();
        session()->flash('success', 'Asignación eliminada correctamente');
        return redirect()->route('project-users.index');
    }
}