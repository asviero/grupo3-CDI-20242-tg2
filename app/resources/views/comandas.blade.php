@extends('layouts.app')

@section('title', 'Lista de Comandas')

@section('content')
    <h1>Lista de Comandas</h1>

    <div style="overflow-x:auto; text-align:center;">
        <table style="width: 60%; margin: 20px auto; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #ff4081; color: #fff;">
                    <th style="padding: 12px; border-right: 1px solid #fff;">ID Comanda</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Nome do Cliente</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">CPF do Cliente</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comandas as $comanda)
                    <tr style="background-color: #1e1e1e; color: #f0f0f0; border-bottom: 1px solid #555;">
                        <td style="padding: 12px; border-right: 1px solid #555; word-wrap: break-word;">{{ $comanda->id_comanda }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $comanda->nome_cliente }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $comanda->cpf_cliente }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">
                            <!-- Botão "Acrescentar item" -->
                            <a href="{{ route('comandas.acrescentar', ['id_comanda' => $comanda->id_comanda]) }}" style="color: #ff4081; font-size: 20px; text-decoration: none;">
                                <i class="fas fa-plus-circle"></i> Acrescentar item
                            </a>
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
