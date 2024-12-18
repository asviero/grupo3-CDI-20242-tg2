@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <h1>Lista de Clientes</h1>

    <div style="overflow-x:auto; text-align:center;">
        <table style="width: 60%; margin: 20px auto; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #ff4081; color: #fff;">
                    <th style="padding: 12px; border-right: 1px solid #fff;">Nome</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">CPF</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr style="background-color: #1e1e1e; color: #f0f0f0; border-bottom: 1px solid #555;">
                        <td style="padding: 12px; border-right: 1px solid #555; word-wrap: break-word;">{{ $cliente->nome }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $cliente->cpf }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">
                            <a href="{{ route('clientes.editar', ['cpf' => $cliente->cpf]) }}" style="color: #ff4081; font-size: 20px; text-decoration: none;">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <!-- Botão Excluir com formulário -->
                            <form action="{{ route('clientes.excluir', ['cpf' => $cliente->cpf]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ff4081; font-size: 20px;">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Botão "Voltar" -->
    <div style="text-align: left; margin-top: 20px;">
        <a href="{{ url('/') }}" style="text-decoration: none;">
            <button style="display: block; width: 100%; padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; margin-bottom: 15px; box-sizing: border-box;">
                Voltar
            </button>
        </a>
    </div>
@endsection
