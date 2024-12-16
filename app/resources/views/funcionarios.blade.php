@extends('layouts.app')

@section('title', 'Funcionários')

@section('content')
    <h1>Lista de Funcionários</h1>

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
                @foreach ($funcionarios as $funcionario)
                    <tr style="background-color: #1e1e1e; color: #f0f0f0; border-bottom: 1px solid #555;">
                        <td style="padding: 12px; border-right: 1px solid #555; word-wrap: break-word;">{{ $funcionario->nome }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $funcionario->cpf }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">
                            <a href="{{ route('funcionarios.editar', ['cpf' => $funcionario->cpf]) }}" style="color: #ff4081; font-size: 20px; text-decoration: none;">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <!-- Botão Excluir com ícone -->
                            <form action="{{ route('funcionarios.excluir', ['cpf' => $funcionario->cpf]) }}" method="POST" style="display: inline-block; margin-left: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ff4081; font-size: 20px; padding: 0; margin: 0; cursor: pointer;">
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
