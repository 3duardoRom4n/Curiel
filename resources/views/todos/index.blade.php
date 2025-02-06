@extends('app')

@section('content')

<div class="container w-25 border p-4">
    
    <form  method="POST" action="{{route('todos')}}">
        @csrf

        <div class="mb-3 col">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
            <label for="title" class="form-label">Placa a registrar</label>
            <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="">

            
            <label for="tipo_vehiculo" class="form-label">Tipo de Vehículo</label>
                <select class="form-select mb-2" id="tipo_vehiculo" name="tipo_vehiculo" required>
                    <option value="" disabled selected>Seleccionar tipo de vehículo</option>
                    <option value="Liviano">Liviano</option>
                    <option value="Motocicleta">Motocicleta</option>
                    <option value="Pesado">Pesado</option>
                </select>
           

            <label for="fecha_venci" class="form-label">Fecha de vencimiento</label>
            <input type="date" class="form-control mb-2" name="fecha_venci" id="exampleFormControlInput1" placeholder="">

            <label for="category_id" class="form-label">Cliente asociado a la placa</label>
            <select name="category_id" class="form-select">
                <option value="" disabled selected>Seleccionar el cliente</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}} </option>
                @endforeach
            </select>
            <input type="submit" value="Registrar" class="btn btn-primary my-3" />
        </div>
    </form>

    <!-- Mostrar el listado completo de placas -->
    <!-- <div >
        @foreach ($todos as $todo)
        
            <div class="row py-1">
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
            </div>
            
        @endforeach
    </div> -->
    </div>
</div>
@endsection