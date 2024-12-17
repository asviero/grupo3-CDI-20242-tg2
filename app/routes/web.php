<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\FestaController;

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




//Rota para acessar comandas
Route::get('/comandas', [ComandaController::class, 'index'])->name('comandas');

//Rota para acrescentar item na comanda
Route::get('/comandas/acrescentar/{id_comanda}', [ComandaController::class, 'acrescentar'])->name('comandas.acrescentar');

//Rota para salvar os itens
Route::post('/comandas/{id_comanda}/salvar-item', [ComandaController::class, 'salvarItem'])->name('comandas.salvarItem');

// Rota para mostrar o formulário de adicionar item à comanda
Route::get('/comandas/{id_comanda}/acrescentar', [ComandaController::class, 'acrescentar'])->name('comandas.acrescentar');

// Rota para salvar o item na comanda
Route::post('/comanda/{id_comanda}/salvar-item', [ComandaController::class, 'salvarItem'])->name('comandas.salvar_item');


// Rota para exibir todos os funcionários
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios');

// Rota para excluir um funcionário
Route::delete('/funcionarios/{cpf}', [FuncionarioController::class, 'excluir'])->name('funcionarios.excluir');

// Rota para editar um funcionário
Route::get('/funcionarios/editar/{cpf}', [FuncionarioController::class, 'editar'])->name('funcionarios.editar');

// Rota para atualizar um funcionário
Route::put('/funcionario/atualizar/{cpf}', [FuncionarioController::class, 'atualizar'])->name('funcionario.atualizar');

// Rota para confirmar o pagamento
Route::post('/comandas/{id_comanda}/confirmarPagamento', [ComandaController::class, 'confirmarPagamento'])->name('comandas.confirmarPagamento');

// Rota para criar a Festa
Route::get('/festa/criar', [FestaController::class, 'criar'])->name('festa.criar');

// Rota para salvar a Festa
Route::post('/festa/salvar', [FestaController::class, 'salvar'])->name('festa.salvar');

// Rota para excluir a Festa
Route::delete('/festa/excluir/{id_festa}', [FestaController::class, 'excluir'])->name('festa.excluir');
