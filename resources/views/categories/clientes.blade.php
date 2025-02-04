@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <h2>Clientes</h2>
    <table class="table table-striped">
        <tbody>

    <div >
        @foreach ($categories as $category)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                        <span class="color-container" style="background-color: {{ $category->color }}"></span> {{ $category->name }}
                    </a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}">Eliminar</button>
                    
                </div>
            </div>

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