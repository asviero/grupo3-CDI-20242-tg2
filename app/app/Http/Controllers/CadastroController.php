<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CadastroController extends Controller
{
    public function salvar(Request $request)
    {
        // Recebe os dados do formulário
        $cpf = preg_replace('/\D/', '', $request->input('cpf')); // Remove formatação do CPF
        $nome = $request->input('nome');
        $telefone = $request->input('telefone');
        $data_nascimento = $request->input('data_nascimento');
        $tipo = $request->input('tipo');

        // Insere os dados na tabela Pessoa com a coluna 'tipo'
        DB::insert('insert into Pessoa (cpf, nome, telefone, data_nascimento, tipo) values (?, ?, ?, ?, ?)', 
        [$cpf, $nome, $telefone, $data_nascimento, $tipo]);

        // Insere na tabela Cliente ou Funcionario com base no tipo
        if ($tipo === 'Cliente') {
            DB::insert('insert into Cliente (cpf) values (?)', [$cpf]);
        } else {
            DB::insert('insert into Funcionario (cpf) values (?)', [$cpf]);
        }

        // Retorna para a página inicial com a mensagem de sucesso
        return redirect('/')->with('success', 'Cadastro realizado com sucesso!');
    }
}
