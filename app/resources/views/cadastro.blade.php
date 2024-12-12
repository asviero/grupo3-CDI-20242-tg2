<!-- resources/views/cadastro.blade.php -->
@extends('layouts.app')

@section('title', 'Cadastro - Casa Noturna')

@section('content')
    <h1>Cadastro</h1>
    <form action="{{ route('cadastro.salvar') }}" method="POST" onsubmit="return validarCPF();">
        @csrf
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
            <span class="error" id="cpfError"></span>
        </div>

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </div>

        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="radio-group">
            <div>
                <input type="radio" id="cliente" name="tipo" value="Cliente" required>
                <label for="cliente">Cliente</label>
            </div>
            <div>
                <input type="radio" id="funcionario" name="tipo" value="Funcionario" required>
                <label for="funcionario">Funcionário</label>
            </div>
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <script>
        $(document).ready(function () {
            // Máscaras para CPF e telefone
            $('#cpf').mask('000.000.000-00');
            $('#telefone').mask('(00) 00000-0000');
        });

        // Função para validar CPF
        function validarCPF() {
            return true;
        }
    </script>
@endsection
