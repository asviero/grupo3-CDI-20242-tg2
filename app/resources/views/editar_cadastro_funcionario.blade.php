@extends('layouts.app')

@section('title', 'Editar Funcionário')

@section('content')
    <h1>Editar Funcionário</h1>

    <form action="{{ route('funcionarios.atualizar', $funcionario->cpf) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $funcionario->nome }}" required>
        
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="{{ $funcionario->telefone }}" required>
        
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" value="{{ $funcionario->data_nascimento }}" required>
        
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="Cliente" {{ $funcionario->tipo == 'Cliente' ? 'selected' : '' }}>Cliente</option>
            <option value="Funcionario" {{ $funcionario->tipo == 'Funcionario' ? 'selected' : '' }}>Funcionário</option>
        </select>

        <button type="submit" class="button">Atualizar</button>
    </form>
@endsection
