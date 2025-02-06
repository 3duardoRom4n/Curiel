<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3',
            'tipo_vehiculo' => 'required|max:255',
            'fecha_venci' => 'required|date',
        ]);
    
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->tipo_vehiculo = $request->tipo_vehiculo;
        $todo->fecha_venci = $request->fecha_venci;
        $todo->category_id = $request->category_id;
        $todo->save();
    
    
        return redirect()->route('todos')->with('success', 'Placa agregada con éxito');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Placa eliminada de la base de datos');
    }

    public function show($id){
        $todo = Todo::find($id);
        $categories = Category::all();
        return view('todos.show', ['todo' => $todo, 'categories' => $categories]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        
        $todo->title = $request->title;
        $todo->tipo_vehiculo = $request->tipo_vehiculo;
        $todo->fecha_venci = $request->fecha_venci;
        $todo->save();

        return redirect()->route('placas.index')->with('success', 'Placa actualizada');
    }
}