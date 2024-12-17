@extends('layouts.app')

@section('title', 'Acrescentar Itens à Comanda')

@section('content')
    <h1>Acrescentar Itens à Comanda: #{{ $comanda->id_comanda }}</h1>

    <!-- Formulário para adicionar bebida -->
    <form action="{{ route('comandas.salvarItem', $comanda->id_comanda) }}" method="POST">
        @csrf
        <div>
            <label for="bebida">Bebida</label>
            <select name="bebida" id="bebida" required>
                @foreach ($bebidas as $bebida)
                    <option value="{{ $bebida->ID_Bebida }}">{{ $bebida->Nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" required min="1">
        </div>

        <button type="submit">Adicionar Item</button>
    </form>

    <!-- Tabela de itens já adicionados à comanda -->
    <h2>Itens na Comanda</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço (R$)</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $totalComanda = 0; @endphp
            @foreach ($itensComanda as $item)
                @if ($item->quantidade_total > 0)
                    <tr>
                        <td>{{ $item->nome_bebida }}</td>
                        <td>{{ number_format($item->preco_bebida, 2, ',', '.') }}</td>
                        <td>{{ $item->quantidade_total }}</td>
                        <td>{{ number_format($item->preco_bebida * $item->quantidade_total, 2, ',', '.') }}</td>
                    </tr>
                    @php $totalComanda += $item->preco_bebida * $item->quantidade_total; @endphp
                @endif
            @endforeach
        </tbody>
    </table>

    <!-- Exibir total da comanda -->
    <h3>Total: R$ {{ number_format($totalComanda, 2, ',', '.') }}</h3>

    <!-- Botão para confirmar o pagamento -->
    <form action="{{ route('comandas.confirmarPagamento', $comanda->id_comanda) }}" method="POST">
        @csrf
        <button type="submit" onclick="return confirm('Tem certeza que deseja confirmar o pagamento?')">Confirmar Pagamento</button>
    </form>

    <!-- Link para voltar -->
    <a href="{{ route('comandas') }}">Voltar para as comandas</a>
@endsection
