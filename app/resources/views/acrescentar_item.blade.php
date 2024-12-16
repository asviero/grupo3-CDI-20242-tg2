@extends('layouts.app')

@section('title', 'Acrescentar Item à Comanda')

@section('content')
    <h1>Acrescentar Bebida à Comanda: {{ $comanda->id_comanda }}</h1>

    <form action="{{ route('comandas.salvar_item', $comanda->id_comanda) }}" method="POST">
        @csrf

        <!-- Selecione a Bebida -->
        <div>
            <label for="bebida">Bebida</label>
            <select name="bebida" id="bebida" required>
                @foreach($bebidas as $bebida)
                    <option value="{{ $bebida->ID_Bebida }}">{{ $bebida->Nome }} - R$ {{ number_format($bebida->Preco, 2, ',', '.') }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantidade -->
        <div>
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" required min="1">
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" style="padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; width: 100%; box-sizing: border-box;">
                Acrescentar Bebida
            </button>
        </div>
    </form>

    <div style="text-align: left; margin-top: 20px;">
        <a href="{{ route('comandas') }}" style="text-decoration: none;">
            <button style="display: block; width: 100%; padding: 12px; font-size: 14px; border: 1px solid #555; border-radius: 5px; background-color: #ff4081; color: #f0f0f0; margin-bottom: 15px; box-sizing: border-box;">
                Voltar
            </button>
        </a>
    </div>
@endsection
