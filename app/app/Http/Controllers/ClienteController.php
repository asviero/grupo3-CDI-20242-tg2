<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClienteController extends Controller
{
    // Método para exibir os clientes
    public function index()
    {
        // Consulta todos os clientes do banco
        $clientes = DB::select('SELECT * FROM Pessoa WHERE tipo = "Cliente"');
        return view('clientes', ['clientes' => $clientes]);
    }

    // Método para excluir o cliente
    public function excluir($cpf)
    {
        // Exclui o cliente da tabela Cliente
        DB::delete('DELETE FROM Cliente WHERE cpf = ?', [$cpf]);

        // Exclui o cliente da tabela Pessoa
        DB::delete('DELETE FROM Pessoa WHERE cpf = ?', [$cpf]);

        // Redireciona para a página de clientes com mensagem de sucesso
        return redirect()->route('clientes')->with('success', 'Cliente excluído com sucesso!');
    }

    // Método para exibir o formulário de edição de um cliente
    public function editar($cpf)
    {
        // Consulta os dados do cliente
        $cliente = DB::select('SELECT * FROM Pessoa WHERE cpf = ?', [$cpf]);

        // Verifica se o cliente foi encontrado
        if (empty($cliente)) {
            return redirect()->route('clientes')->with('error', 'Cliente não encontrado!');
        }

        // Retorna a view com os dados do cliente
        return view('editar_cadastro', ['cliente' => $cliente[0]]);
    }

    // Método para salvar as alterações no cliente
    public function atualizar(Request $request, $cpf)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'data_nascimento' => 'required|date',
            'tipo' => 'required|in:Cliente,Funcionario',
        ]);

        // Atualizando o cliente no banco de dados
        DB::table('Pessoa')
            ->where('cpf', $cpf)
            ->update([
                'nome' => $request->input('nome'),
                'telefone' => $request->input('telefone'),
                'data_nascimento' => $request->input('data_nascimento'),
                'tipo' => $request->input('tipo'),
            ]);

        return redirect()->route('clientes')->with('success', 'Cadastro atualizado com sucesso!');
    }
}
