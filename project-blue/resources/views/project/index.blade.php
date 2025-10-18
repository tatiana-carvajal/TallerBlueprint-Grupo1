@extends('templates.base')

@section('title', 'Proyectos')
@section('subtitle', 'Listado de todos los proyectos')

@section('content')
    <div class="row mb-3">
        <div class="col-12 text-end">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nuevo Proyecto
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Propietario ID</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ Str::limit($project->description, 50) }}</td>
                                <td>{{ $project->owner_id }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                            data-toggle="modal" data-target="#modalShow{{ $project->id }}">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </button>
                                        <a href="{{ route('projects.edit', $project->id) }}"
                                            class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('projects.destroy', $project->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-fill btn-sm btn-delete"
                                                title="Eliminar">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($projects as $project)
        <div class="modal fade" id="modalShow{{ $project->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalShowLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalShowLabel{{ $project->id }}">Detalles del Proyecto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> {{ $project->id }}</p>
                        <p><strong>Título:</strong> {{ $project->title }}</p>
                        <p><strong>Descripción:</strong> {{ $project->description }}</p>
                        <p><strong>Propietario ID:</strong> {{ $project->owner_id }}</p>
                        <p><strong>Creado:</strong> {{ $project->created_at }}</p>
                        <p><strong>Actualizado:</strong> {{ $project->updated_at }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection