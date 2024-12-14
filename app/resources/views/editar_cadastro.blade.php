@extends('layouts.app')

@section('title', 'Editar Cadastro')

@section('content')
    <h1>Editar Cadastro de Cliente</h1>

    <form action="{{ route('clientes.atualizar', $cliente->cpf) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="{{ $cliente->nome }}" required>
        </div>

        <!-- CPF -->
        <div>
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" value="{{ $cliente->cpf }}" required disabled>
        </div>

        <!-- Telefone -->
        <div>
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" value="{{ $cliente->telefone }}" required>
        </div>

        <!-- Data de Nascimento -->
        <div>
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $cliente->data_nascimento }}" required>
        </div>

        <!-- Tipo (Cliente ou Funcionário) -->
        <div class="radio-group">
            <label><input type="radio" name="tipo" value="Cliente" {{ $cliente->tipo == 'Cliente' ? 'checked' : '' }}> Cliente</label>
            <label><input type="radio" name="tipo" value="Funcionario" {{ $cliente->tipo == 'Funcionario' ? 'checked' : '' }}> Funcionário</label>
        </div>

        <!-- Botão de Salvar -->
        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" style="padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; width: 100%; box-sizing: border-box;">
                Atualizar Cadastro
            </button>
        </div>
    </form>

    <!-- Botão "Voltar" -->
    <div style="text-align: left; margin-top: 20px;">
        <a href="{{ route('clientes') }}" style="text-decoration: none;">
            <button style="display: block; width: 100%; padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; margin-bottom: 15px; box-sizing: border-box;">
                Voltar
            </button>
        </a>
    </div>
@endsection
