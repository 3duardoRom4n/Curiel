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
    @if ($category->todos->count() > 0)
        @foreach ($category->todos as $todo )
            <div class="row py-1">
            <label for="exampleFormControlInput1" class="form-label mb-4">Placas registradas con este cliente</label> 
                <div class="col-md-9 d-flex align-items-center">                
                    <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
                <a href="{{route('todos')}}" class="btn btn-warning my-4"><i class="fas fa-edit"></i>Agregar otra placa para este cliente</a>
            </div>
        @endforeach    
    @else

    <label for="exampleFormControlInput1" class="form-label mb-2">No hay placas registradas con este cliente</label>        
    
        <a href="{{route('todos')}}" class="btn btn-warning my-2"><i class="fas fa-edit"></i>Agregar placa</a> 
        
    @endif
    
    </div>
    </div>
</div>
@endsection