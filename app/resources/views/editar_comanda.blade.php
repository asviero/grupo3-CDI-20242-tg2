@extends('layouts.app')

@section('title', 'Editar Comanda')

@section('content')
    <h1>Editar Comanda</h1>

    <form action="{{ route('comandas.atualizar', $comanda->id_comanda) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- ID Comanda -->
        <div>
            <label for="id_comanda">ID Comanda</label>
            <input type="text" id="id_comanda" name="id_comanda" value="{{ $comanda->id_comanda }}" required disabled>
        </div>

        <!-- Nome do Cliente -->
        <div>
            <label for="nome_cliente">Nome do Cliente</label>
            <input type="text" id="nome_cliente" name="nome_cliente" value="{{ $comanda->nome_cliente }}" required>
        </div>

        <!-- CPF do Cliente -->
        <div>
            <label for="cpf_cliente">CPF do Cliente</label>
            <input type="text" id="cpf_cliente" name="cpf_cliente" value="{{ $comanda->cpf_cliente }}" required>
        </div>

        <!-- Botão de Atualizar -->
        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" style="padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; width: 100%; box-sizing: border-box;">
                Atualizar Comanda
            </button>
        </div>
    </form>

    <!-- Botão "Voltar" -->
    <div style="text-align: left; margin-top: 20px;">
        <a href="{{ route('comandas') }}" style="text-decoration: none;">
            <button style="display: block; width: 100%; padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; margin-bottom: 15px; box-sizing: border-box;">
                Voltar
            </button>
        </a>
    </div>
@endsection