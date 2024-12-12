<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('URL', [Controller::class, 'função']);

Route::get('listagem-usuario', [UserController::class, 'listUser']);
Route::get('admin', [AdminController::class, 'adminHome']);

Route::get('/', function () {
    return view('home');
});

Route::get('/cadastro', function () {
    return 'Página de Cadastro';
})->name('cadastro');

Route::get('/clientes', function () {
    return 'Página de Clientes';
})->name('clientes');

Route::get('/funcionarios', function () {
    return 'Página de Funcionários';
})->name('funcionarios');

