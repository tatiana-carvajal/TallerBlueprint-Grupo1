@extends('templates.base')

@section('title', 'Tareas')
@section('subtitle', 'Listado de todas las tareas')

@section('content')
    <div class="row mb-3">
        <div class="col-12 text-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nueva Tarea
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
                            <th>Nombre</th>
                            <th>Proyecto</th>
                            <th>Estado</th>
                            <th>Vencimiento</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->project->title ?? 'Sin proyecto' }}</td>
                                <td>
                                    @if ($task->status == 'completado')
                                        <span class="badge badge-success">Completado</span>
                                    @elseif($task->status == 'pendiente')
                                        <span class="badge badge-warning">Pendiente</span>
                                    @else
                                        <span class="badge badge-danger">Cancelado</span>
                                    @endif
                                </td>
                                <td>{{ $task->due_date ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-info btn-fill btn-sm mr-2" title="Ver"
                                            data-toggle="modal" data-target="#modalShow{{ $task->id }}">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </button>
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                            class="btn btn-warning btn-fill btn-sm mr-2" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
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
        @foreach ($tasks as $task)
            <div class="modal fade" id="modalShow{{ $task->id }}" tabindex="-1" role="dialog"
                aria-labelledby="modalShowLabel{{ $task->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalShowLabel{{ $task->id }}">Detalles de la Tarea</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>ID:</strong> {{ $task->id }}</p>
                            <p><strong>Nombre:</strong> {{ $task->name }}</p>
                            <p><strong>Proyecto:</strong> {{ $task->project->title ?? 'N/A' }}</p>
                            <p><strong>Descripción:</strong> {{ $task->description ?? 'N/A' }}</p>
                            <p><strong>Estado:</strong> <span class="text-capitalize">{{ $task->status }}</span></p>
                            <p><strong>Fecha Vencimiento:</strong> {{ $task->due_date ?? 'N/A' }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
