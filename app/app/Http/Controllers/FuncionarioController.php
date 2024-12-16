<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FuncionarioController extends Controller
{
    // Método para exibir os funcionários
    public function index()
    {
        // Consulta todos os funcionários
        $funcionarios = DB::select('SELECT * FROM Pessoa WHERE tipo = "Funcionario"');
        return view('funcionarios', ['funcionarios' => $funcionarios]);
    }

    // Método para excluir o funcionário
    public function excluir($cpf)
    {
        // Exclui o funcionário da tabela Funcionario
        DB::delete('DELETE FROM Funcionario WHERE cpf = ?', [$cpf]);

        // Exclui o funcionário da tabela Pessoa
        DB::delete('DELETE FROM Pessoa WHERE cpf = ?', [$cpf]);

        // Redireciona para a página de funcionários com mensagem de sucesso
        return redirect()->route('funcionarios')->with('success', 'Funcionário excluído com sucesso!');
    }

    // Método para exibir o formulário de edição de um funcionário
    public function editar($cpf)
    {
        // Consulta os dados do funcionário
        $funcionario = DB::select('SELECT * FROM Pessoa WHERE cpf = ? AND tipo = ?', [$cpf, 'Funcionario']);

        // Verifica se o funcionário foi encontrado
        if (empty($funcionario)) {
            return redirect()->route('funcionarios')->with('error', 'Funcionário não encontrado!');
        }

        // Retorna a view com os dados do funcionário
        return view('editar_cadastro_funcionario', ['funcionario' => $funcionario[0]]);
    }

    // Método para salvar as alterações no funcionário
    public function atualizar(Request $request, $cpf)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'data_nascimento' => 'required|date',
            'tipo' => 'required|in:Cliente,Funcionario',
        ]);

        // Atualizando os dados do funcionário na tabela Pessoa
        DB::table('Pessoa')
            ->where('cpf', $cpf)
            ->where('tipo', 'Funcionario') // Garante que estamos atualizando apenas um funcionário
            ->update([
                'nome' => $request->input('nome'),
                'telefone' => $request->input('telefone'),
                'data_nascimento' => $request->input('data_nascimento'),
                'tipo' => $request->input('tipo'),
            ]);

        // Redireciona para a página de funcionários com uma mensagem de sucesso
        return redirect()->route('funcionarios')->with('success', 'Funcionário atualizado com sucesso!');
    }
}
