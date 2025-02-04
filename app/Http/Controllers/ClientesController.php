<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ClientesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.clientes', ['categories' => $categories]);
    }
}
