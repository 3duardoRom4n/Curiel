@extends('app')

@section('content')

<div class="container w-50 border p-4">
    <div class="row mx-auto">
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
        @if (session ('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>            
        @endif

        @error('title')
            <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
            <th class="text-center">Título</th>
            <th class="text-center">Tipo de Vehículo</th>
            <th class="text-center">Fecha de Vencimiento</th>
            <th class="text-center">Acción</th> <!-- Título con centrado de texto -->
        </tr>
    </thead>
    <tbody>
        @foreach ($todos as $todo)
        <tr>
            <td class="text-center"><a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a></td>
            <td class="text-center">{{ $todo->tipo_vehiculo }}</td>
            <td class="text-center">{{ $todo->fecha_venci }}</td>
            <td class="text-center">      
                <!-- Botón Editar -->                          
                <a href="{{ route('todos-edit', ['id' => $todo->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Editar</a>      
                
                 <!-- Formulario para el botón Eliminar -->

                 <!-- Botón Eliminar -->
                 <button class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#modal{{$todo->id}}">Eliminar</button>                         
            </td>
        </tr>
                     
            <!-- MODAL -->
            <div class="modal fade" id="modal{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar placa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    ¿Está seguro de eliminar la placa <strong>{{ $todo->title }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                        <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-primary">Sí, eliminar placa</button>
                        </form>
                        
                    </div>
                    </div>
                </div>
            </div>
                          
            </td>    
        </tr>        
        @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection