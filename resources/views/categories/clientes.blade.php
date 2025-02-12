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
            <th class="text-center">Nombre</th>
            <th class="text-center">Referencia</th>
            <th class="text-center">Teléfono</th> <!-- Título con centrado de texto -->
            <th class="text-center">Acción</th>
        </tr>
    </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
        <td class="text-center">
            <div class="row py-1"> <a class= "d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                <span class="color-container" style="background-color: {{ $category->color }}"></span> {{ $category->name }} </td>
            <td class="text-center">{{ $category->referencia }}</td>
            <td class="text-center">{{ $category->telefono }}</td>
            <td class="text-center">
            <!-- Botón Editar -->                          
            <a href="{{ route('categories.show', ['category' => $category->id]) }}"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Editar</a>
            
             <!-- Botón Eliminar -->
                        <button class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}">Eliminar</button>                         
            </td>
        </tr>
                     
            <!-- MODAL -->
            <div class="modal fade" id="modal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Al eliminar el cliente <strong>{{ $category->name }}</strong> se eliminarán todas las placas asignadas a la misma. 
                        <strong> ¿Está seguro?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-primary">Sí, eliminar cliente</button>
                        </form>
                        
                    </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>

    </tbody>
    </table>
    </div>
</div>

@endsection