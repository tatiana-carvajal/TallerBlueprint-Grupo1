@extends('templates.base')

@section('title', 'Editar Asignación')
@section('subtitle', 'Modificar información de la asignación proyecto-usuario')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form method="POST" action="{{ route('project-users.update', $projectUser->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Proyecto <span class="text-danger">*</span></label>
                <select name="project_id" id="project_id" class="form-control @error('project_id') is-invalid @enderror" required>
                    <option value="">Seleccione un proyecto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" 
                                {{ (old('project_id') ?? $projectUser->project_id) == $project->id ? 'selected' : '' }}>
                            {{ $project->title }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="user_id">Usuario <span class="text-danger">*</span></label>
                <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                                {{ (old('user_id') ?? $projectUser->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Rol <span class="text-danger">*</span></label>
                <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" 
                       value="{{ old('role') ?? $projectUser->role }}" placeholder="Ingrese el rol" required>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Actualizar Asignación
                </button>
                <a href="{{ route('project-users.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection