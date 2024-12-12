<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClienteController extends Controller
{
    // Método para exibir a lista de clientes
    public function index()
    {
        // Consulta os clientes no banco de dados
        $clientes = DB::table('Pessoa')->where('tipo', 'Cliente')->get();

        // Retorna a view com os clientes
        return view('clientes', ['clientes' => $clientes]);
    }
}
