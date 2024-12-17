<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FestaController extends Controller
{
    public function criar()
    {
        // Recupera todas as festas da tabela
        $festas = DB::table('Festa')->get();

        // Passa os dados das festas para a view
        return view('criar_festa', compact('festas'));
    }

    public function salvar(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_festa' => 'required|max:100',
            'atracao' => 'required|max:100',
            'data' => 'required|date',
            'atracoes' => 'nullable|max:100',
        ]);

        // Inserir os dados na tabela Festa
        DB::table('Festa')->insert([
            'nome_festa' => $request->nome_festa,
            'atracoes' => $request->atracao,
            'data' => $request->data,
            'atracoes' => $request->atracoes,
        ]);

        // Redireciona para a página de criação com sucesso
        return redirect('/')->with('success', 'Festa criada com sucesso');
    }

    public function excluir($id_festa)
    {
        // Exclui a festa da tabela
        DB::table('Festa')->where('id_festa', $id_festa)->delete();

        // Redireciona de volta para a página de criação com sucesso
        return redirect()->route('festa.criar')->with('success', 'Festa excluída com sucesso!');
    }

}
