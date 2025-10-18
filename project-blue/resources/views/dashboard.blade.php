@extends('templates.base')
@section('title', 'Dashboard')
@section('subtitle', 'Panel Principal')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">¡Bienvenido, {{ Auth::user()->name }}!</h4>
                    <p class="card-text">Has iniciado sesión correctamente en ProjectBlue.</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('projects.index') }}" class="btn btn-primary btn-block">
                                <i class="nc-icon nc-briefcase-24"></i> Ver Proyectos
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('tasks.index') }}" class="btn btn-info btn-block">
                                <i class="nc-icon nc-check-2"></i> Ver Tareas
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('project-users.index') }}" class="btn btn-success btn-block">
                                <i class="nc-icon nc-single-02"></i> Ver Asignaciones
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-briefcase-24 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Proyectos</p>
                                <p class="card-title">{{ \App\Models\Project::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-check-2 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Tareas</p>
                                <p class="card-title">{{ \App\Models\Task::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-single-02 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Asignaciones</p>
                                <p class="card-title">{{ \App\Models\ProjectUser::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection