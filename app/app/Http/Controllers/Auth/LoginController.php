<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Exibe a página de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Processa a autenticação
    public function login(Request $request)
    {
        // Validação dos campos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Se a autenticação for bem-sucedida, redireciona para a página inicial
            return redirect()->intended('/');
        }

        // Se a autenticação falhar, redireciona com erro
        return Redirect::back()->withErrors(['email' => 'As credenciais fornecidas são inválidas.']);
    }

    // Deslogar o usuário
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
