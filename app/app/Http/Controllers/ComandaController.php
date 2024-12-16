<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ComandaController extends Controller
{
    public function index()
    {
        $comandas = DB::select("
            SELECT
                Comanda.id_comanda,
                Pessoa.cpf AS cpf_cliente,
                Pessoa.nome AS nome_cliente
            FROM Comanda
            INNER JOIN Pessoa ON Comanda.cpf_cliente = Pessoa.cpf
        ");

        return view('comandas', ['comandas' => $comandas]);
    }
    
    public function acrescentar($id_comanda)
    {
        // Recupera a comanda com o ID fornecido
        $comanda = DB::select('SELECT * FROM Comanda WHERE id_comanda = ?', [$id_comanda]);

        if (empty($comanda)) {
            return redirect()->route('comandas')->with('error', 'Comanda não encontrada!');
        }

        // Recupera as bebidas disponíveis
        $bebidas = DB::select('SELECT * FROM Bebidas');

        return view('acrescentar_item', ['comanda' => $comanda[0], 'bebidas' => $bebidas]);
    }

    public function salvarItem(Request $request, $id_comanda)
    {
        // Validação
        $request->validate([
            'bebida' => 'required|integer|exists:Bebidas,ID_Bebida',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Insira o item na tabela de ItemComanda
        DB::insert('
            INSERT INTO ItemComanda (ID_Comanda, ID_Bebida, Quantidade)
            VALUES (?, ?, ?)
        ', [
            $id_comanda, 
            $request->bebida, 
            $request->quantidade
        ]);

        return redirect()->route('comandas')->with('success', 'Item acrescentado à comanda!');
    }

}