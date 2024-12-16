@extends('layouts.app')

@section('title', 'Editar Funcionário')

@section('content')
    <h1>Editar Funcionário</h1>

    <form action="{{ route('funcionario.atualizar', $funcionario->cpf) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $funcionario->nome) }}" required>
        </div>
        
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $funcionario->telefone) }}" required>
        </div>

        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $funcionario->data_nascimento) }}" required>
        </div>

        <div>
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="Cliente" {{ old('tipo', $funcionario->tipo) == 'Cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="Funcionario" {{ old('tipo', $funcionario->tipo) == 'Funcionario' ? 'selected' : '' }}>Funcionário</option>
            </select>
        </div>

        <button type="submit" class="button">Atualizar</button>
    </form>
@endsection
