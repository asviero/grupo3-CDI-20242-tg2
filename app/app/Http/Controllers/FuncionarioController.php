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

    // Outras funções do controller podem ser adicionadas aqui
}
