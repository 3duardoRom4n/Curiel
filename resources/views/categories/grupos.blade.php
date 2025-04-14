@extends('app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center text-warning fw-bold">Clientes por Referencia</h2>

    <div class="row">
        @foreach ($category as $referencia => $grupo)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center fw-bold bg-dark" style="border-radius: 10px 10px 10px 10px;">
                        <h6 class="mb-0">
                            <button class="btn text-warning fw-bold text-decoration-none fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ Str::slug($referencia) }}" aria-expanded="false" aria-controls="collapse{{ Str::slug($referencia) }}">
                                <i class="fas fa-users me-2"></i> {{ $referencia }}
                            </button>
                        </h6>
                    </div>
                    
                    <div id="collapse{{ Str::slug($referencia) }}" class="collapse">
                        <div class="card-body p-2">
                            @foreach ($grupo as $category)
                                <div class="card mb-2 border-light shadow-sm rounded">
                                    <div class="card-body d-flex justify-content-between align-items-center p-2">
                                        <div>
                                            <h6 class="card-title text-primary fw-bold mb-1">
                                                <i class="fas fa-user me-1"></i> {{ $category->title }}
                                            </h6>
                                            <p class="card-text mb-0">
                                                <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="text-decoration-none text-dark">
                                                    <i class="fas fa-id-card me-1"></i> {{ $category->name }}
                                                </a>
                                            </p>
                                        </div>

                                        <div class="d-flex gap-2">
                                            <!-- Botón Editar -->
                                            <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit">Editar</i>
                                            </a>

                                            <!-- Botón Eliminar -->
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}">
                                                <i class="fas fa-trash">Eliminar</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de eliminación -->
                                <div class="modal fade" id="modal{{$category->id}}" tabindex="-1" aria-labelledby="modalLabel{{$category->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="modalLabel{{$category->id}}">Eliminar Cliente</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Al eliminar el cliente <strong>{{ $category->name }}</strong>, se eliminarán todas las placas asignadas.</p>
                                                <p class="fw-bold">¿Está seguro?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .card-header button {
        transition: transform 0.2s ease-in-out;
    }
    
    .card-header button:hover {
        transform: scale(1.05);
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
    }

    .card-body a:hover {
        color: #6610f2 !important;
    }
</style>

@endsection
