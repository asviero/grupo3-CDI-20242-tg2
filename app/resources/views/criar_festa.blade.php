@extends('layouts.app')

@section('title', 'Criar Festa')

@section('content')
    <h1>Criar Festa</h1>

    <form action="{{ route('festa.salvar') }}" method="POST">
        @csrf
        <div>
            <label for="nome_festa">Nome da Festa</label>
            <input type="text" name="nome_festa" id="nome_festa" required maxlength="100" />
        </div>

        <div>
            <label for="atracao">Atração Principal</label>
            <input type="text" name="atracao" id="atracao" required maxlength="100" />
        </div>

        <div>
            <label for="data">Data da Festa</label>
            <input type="date" name="data" id="data" required />
        </div>

        <div>
            <label for="atracoes">Outras Atrações (opcional)</label>
            <input type="text" name="atracoes" id="atracoes" maxlength="100" />
        </div>

        <button type="submit">Criar Festa</button>
    </form>

    <!-- Exibir todas as festas criadas -->
    <h2>Festas Criadas</h2>
    <div style="overflow-x:auto; text-align:center;">
        <table style="width: 60%; margin: 20px auto; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #ff4081; color: #fff;">
                    <th style="padding: 12px; border-right: 1px solid #fff;">Nome da Festa</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Atração Principal</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Data</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Outras Atrações</th>
                    <th style="padding: 12px; border-right: 1px solid #fff;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($festas as $festa)
                    <tr style="background-color: #1e1e1e; color: #f0f0f0; border-bottom: 1px solid #555;">
                        <td style="padding: 12px; border-right: 1px solid #555; word-wrap: break-word;">{{ $festa->nome_festa }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $festa->atracoes }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ \Carbon\Carbon::parse($festa->data)->format('d/m/Y') }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">{{ $festa->atracoes ?? 'Nenhuma' }}</td>
                        <td style="padding: 12px; border-right: 1px solid #555;">
                            <!-- Botão Excluir com ícone -->
                            <form action="{{ route('festa.excluir', $festa->id_festa) }}" method="POST" style="display: inline-block; margin-left: 10px;">
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
