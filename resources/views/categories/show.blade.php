@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('categories.update',['category' => $category->id])}}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">

        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

         @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

            <label for="exampleFormControlInput1" class="form-label">Nombre del cliente</label>
            <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="" value="{{ $category->name }}">
            
            <label for="exampleColorInput" class="form-label">Elige un color para identificar el cliente</label>
            <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="{{ $category->color }}" title="Choose your color">

            <label for="exampleFormControlInput1" class="form-label">Referencia</label>
            <input type="text" class="form-control mb-2" name="referencia" id="exampleFormControlInput1" placeholder="" value="{{ $category->referencia }}">

            <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
            <input type="text" class="form-control mb-2" name="telefono" id="exampleFormControlInput1" placeholder="" value="{{ $category->telefono }}">

            <input type="submit" value="Actualizar cliente" class="btn btn-primary my-2" />
 
        </div>
    </form>

    <div >
    @if ($category->todos->count() > 0 )
    <label for="exampleFormControlInput1" class="form-label mb-4">Placas registradas con este cliente</label> 
        @foreach ($category->todos as $todo )
            <div class="row py-1">
            
                <div class="col-md-9 d-flex align-items-center">                
                    <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
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
            </div>
                </div>
        @endforeach
        <div class="col-md-20 d-flex justify-content-end">
        <a href="{{route('todos')}}" class="btn btn-warning my-4"><i class="fas fa-edit"></i>Agregar otra placa para este cliente</a>
        </div>    
    @else

    <label for="exampleFormControlInput1" class="form-label mb-2">No hay placas registradas con este cliente</label>        
    
        <a href="{{route('todos')}}" class="btn btn-warning my-2"><i class="fas fa-edit"></i>Agregar placa</a> 
        
    @endif
    
    </div>
    </div>
</div>
@endsection