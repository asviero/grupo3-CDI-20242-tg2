<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CadastroController;

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
Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');

// Rota para salvar os dados do formulário
Route::post('/cadastro', [CadastroController::class, 'salvar'])->name('cadastro.salvar');

// Rota para exibir os clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');

// Rota para excluir o cliente
Route::delete('/clientes/{cpf}', [ClienteController::class, 'excluir'])->name('clientes.excluir');

// Rota para exibir o formulário de edição de um cliente
Route::get('/clientes/editar/{cpf}', [ClienteController::class, 'editar'])->name('clientes.editar');

// Rota para atualizar os dados do cliente
Route::put('/clientes/atualizar/{cpf}', [ClienteController::class, 'atualizar'])->name('clientes.atualizar');

//Rota TODOS
Route::get('/todos', function () {
    // Consulta SQL para buscar todos os clientes e funcionários
    $cadastros = DB::select('SELECT * FROM Pessoa');

    // Retorna a view com os dados de todos os cadastros
    return view('todos', ['cadastros' => $cadastros]);
})->name('todos');


// Rota para exibir todos os funcionários
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios');

// Rota para excluir um funcionário
Route::delete('/funcionarios/{cpf}', [FuncionarioController::class, 'excluir'])->name('funcionarios.excluir');

// Rota para editar um funcionário
Route::get('/funcionarios/editar/{cpf}', [FuncionarioController::class, 'editar'])->name('funcionarios.editar');

// Rota para atualizar um funcionário
Route::put('/funcionarios/{cpf}', [FuncionarioController::class, 'atualizar'])->name('funcionarios.atualizar');
