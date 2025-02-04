@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <h2>Placas</h2>
    <table class="table table-striped">
        <tbody>
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
        </tbody>
    </table>
    </div>
</div>

@endsection