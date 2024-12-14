@extends('layouts.app')

@section('title', 'Todos os Cadastros')

@section('content')
    <h1>Todos os Cadastros</h1>

    <div style="overflow-x:auto; text-align:center;">
        <table style="width: 80%; margin: 20px auto; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #ff4081; color: #fff;">
                    <th style="padding: 12px; border-right: 1px solid #fff;">Nome</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">CPF</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Tipo</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cadastros as $cadastro)
                    <tr style="background-color: #1e1e1e; color: #f0f0f0; border-bottom: 1px solid #555;">
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $cadastro->nome }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $cadastro->cpf }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $cadastro->tipo }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">
                            <!-- Botões de Editar e Excluir -->
                            <a href="{{ route('clientes.editar', $cadastro->cpf) }}" class="button"
                            style="padding: 8px 16px; background-color: #ff4081; color: #fff; text-decoration: none; border-radius: 5px; margin-right: 8px;">
                                Editar
                            </a>
                            <form action="{{ route('clientes.excluir', $cadastro->cpf) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    style="padding: 8px 16px; background-color: #e53977; color: #fff; border: none; border-radius: 5px;">
                                    Excluir
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
        <a href="{{ route('home') }}" style="text-decoration: none;">
            <button style="display: block; width: 100%; padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; margin-bottom: 15px; box-sizing: border-box;">
                Voltar
            </button>
        </a>
    </div>
@endsection
