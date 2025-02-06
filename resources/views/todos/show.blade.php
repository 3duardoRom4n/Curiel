@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('todos-update', ['id' => $todo->id]) }}" method="POST">
        @method('PATCH')
        @csrf

        @if (session ('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>            
        @endif

        @error('title')
            <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror

        <div class="mb-3">
            <label for="title" class="form-label">Actualice la placa</label>
            <input type="text" class="form-control mb-2" name="title" value="{{ $todo->title}}">
            
            <label for="tipo_vehiculo" class="form-label">Tipo de Vehículo</label>
                <select class="form-select mb-2" id="tipo_vehiculo" name="tipo_vehiculo" required>
                    <option value="" disabled selected>{{ $todo->tipo_vehiculo}}</option>
                    <option value="Liviano">Liviano</option>
                    <option value="Motocicleta">Motocicleta</option>
                    <option value="Pesado">Pesado</option>
                </select>

            <label for="fecha_venci" class="form-label">Fecha de vencimiento</label>
            <input type="date" class="form-control mb-2" name="fecha_venci" id="exampleFormControlInput1" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar registro de placa</button>
    </form>

    
</div>

@endsection