@extends('templates.base')

@section('title', 'Asignaciones')
@section('subtitle', 'Listado de todas las asignaciones')

@section('content')
    <div class="row mb-3">
        <div class="col-12 text-end">
            <a href="{{ route('project-users.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nueva Asignación
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
                            <th>Proyecto</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectUsers as $projectUser)
                            <tr>
                                <td>{{ $projectUser->id }}</td>
                                <td>{{ $projectUser->project->title ?? 'Sin proyecto' }}</td>
                                <td>{{ $projectUser->user->name ?? 'Sin usuario' }}</td>
                                <td>
                                    <span class="badge badge-info text-capitalize">{{ $projectUser->role }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                            data-toggle="modal" data-target="#modalShow{{ $projectUser->id }}">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </button>
                                        <a href="{{ route('project-users.edit', $projectUser->id) }}"
                                            class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('project-users.destroy', $projectUser->id) }}"
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

    @foreach ($projectUsers as $projectUser)
        <div class="modal fade" id="modalShow{{ $projectUser->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalShowLabel{{ $projectUser->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalShowLabel{{ $projectUser->id }}">Detalles de la Asignación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> {{ $projectUser->id }}</p>
                        <p><strong>Proyecto:</strong> {{ $projectUser->project->title ?? 'N/A' }}</p>
                        <p><strong>Usuario:</strong> {{ $projectUser->user->name ?? 'N/A' }}</p>
                        <p><strong>Rol:</strong> <span class="text-capitalize">{{ $projectUser->role }}</span></p>
                        <p><strong>Proyecto ID:</strong> {{ $projectUser->project_id }}</p>
                        <p><strong>Usuario ID:</strong> {{ $projectUser->user_id }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection