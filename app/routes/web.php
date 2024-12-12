<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('URL', [Controller::class, 'função']);

Route::get('/', function () {
    return view('home');
});

// Rota para exibir o formulário
Route::get('/cadastro', function () {
    return view('cadastro'); // Retorna a página com o formulário
})->name('cadastro');

// Rota para salvar os dados do formulário
Route::post('/cadastro', function () {
    $cpf = preg_replace('/\D/', '', Request::input('cpf')); // Remove formatação do CPF
    $nome = Request::input('nome');
    $telefone = Request::input('telefone');
    $data_nascimento = Request::input('data_nascimento');
    $tipo = Request::input('tipo');

    // Insere os dados na tabela Pessoa
    DB::insert('insert into Pessoa (cpf, nome, telefone, data_nascimento) values (?, ?, ?, ?)', 
    [$cpf, $nome, $telefone, $data_nascimento]);

    // Insere na tabela Cliente ou Funcionário
    if ($tipo === 'Cliente') {
        DB::insert('insert into Cliente (cpf) values (?)', [$cpf]);
    } else {
        DB::insert('insert into Funcionario (cpf) values (?)', [$cpf]);
    }

    return 'Cadastro realizado com sucesso!';
})->name('cadastro.salvar');

Route::get('/clientes', function () {
    // Consulta SQL para buscar os clientes
    $clientes = DB::select('SELECT * FROM Pessoa WHERE tipo = "Cliente"');
    
    // Retorna a view com os dados dos clientes
    return view('clientes', ['clientes' => $clientes]);
})->name('clientes');



Route::get('/funcionarios', function () {
    return 'Página de Funcionários';
})->name('funcionarios');

