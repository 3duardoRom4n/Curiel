<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;


class PlacasController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.placas', ['todos' => $todos, 'categories' => $categories]);
    }
}
