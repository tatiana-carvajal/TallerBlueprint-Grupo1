@extends('templates.base')

@section('title', 'Editar Proyecto')
@section('subtitle', 'Modificar información del proyecto')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title') ?? $project->title }}" placeholder="Ingrese el título del proyecto" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descripción <span class="text-danger">*</span></label>
                <textarea name="description" id="description" rows="4" 
                          class="form-control @error('description') is-invalid @enderror" 
                          placeholder="Ingrese la descripción del proyecto" required>{{ old('description') ?? $project->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner_id">Propietario <span class="text-danger">*</span></label>
                <select name="owner_id" id="owner_id" class="form-control @error('owner_id') is-invalid @enderror" required>
                    <option value="">Seleccione un propietario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                                {{ (old('owner_id') ?? $project->owner_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('owner_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Actualizar Proyecto
                </button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection