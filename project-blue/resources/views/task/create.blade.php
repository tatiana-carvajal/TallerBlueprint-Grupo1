@extends('templates.base')

@section('title', 'Nueva Tarea')
@section('subtitle', 'Crear una nueva tarea')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="form-group">
                <label for="project_id">Proyecto <span class="text-danger">*</span></label>
                <select name="project_id" id="project_id" class="form-control @error('project_id') is-invalid @enderror" required>
                    <option value="">Seleccione un proyecto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->title }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Nombre de la Tarea <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descripción <span class="text-danger">*</span></label>
                <textarea name="description" id="description" rows="4" 
                          class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Estado <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="">Seleccione un estado</option>
                    <option value="pendiente" {{ old('status') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="completado" {{ old('status') == 'completado' ? 'selected' : '' }}>Completado</option>
                    <option value="cancelado" {{ old('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Fecha de Vencimiento</label>
                <input type="date" name="due_date" id="due_date" 
                       class="form-control @error('due_date') is-invalid @enderror" 
                       value="{{ old('due_date') }}">
                @error('due_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar Tarea
                </button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

