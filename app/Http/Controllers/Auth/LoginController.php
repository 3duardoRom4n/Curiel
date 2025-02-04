<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('main'); // Redirige al main
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function showLoginForm()
{
    return view('auth.login'); // Carga la vista login.blade.php
}

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
