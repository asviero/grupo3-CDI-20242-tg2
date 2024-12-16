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

        // Insere os dados na tabela Pessoa
        DB::insert('INSERT INTO Pessoa (cpf, nome, telefone, data_nascimento, tipo) VALUES (?, ?, ?, ?, ?)',
        [$cpf, $nome, $telefone, $data_nascimento, $tipo]);

        // Insere na tabela Cliente ou Funcionário
        if ($tipo === 'Cliente') {
            DB::insert('INSERT INTO Cliente (cpf) VALUES (?)', [$cpf]);

            // Insere uma comanda automaticamente para o cliente
            DB::insert('INSERT INTO Comanda (cpf_cliente) VALUES (?)', [$cpf]);
        } else {
            DB::insert('INSERT INTO Funcionario (cpf) VALUES (?)', [$cpf]);
        }

        // Retorna para a página inicial com a mensagem de sucesso
        return redirect('/')->with('success', 'Cadastro realizado com sucesso!');
    }
}
