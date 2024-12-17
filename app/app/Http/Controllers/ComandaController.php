<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ComandaController extends Controller
{
    public function index()
    {
        // Recupera todas as comandas e os dados dos clientes associados
        $comandas = DB::select("
            SELECT
                Comanda.id_comanda,
                Pessoa.cpf AS cpf_cliente,
                Pessoa.nome AS nome_cliente
            FROM Comanda
            INNER JOIN Pessoa ON Comanda.cpf_cliente = Pessoa.cpf
        ");

        return view('comandas', ['comandas' => $comandas]);
    }

    public function acrescentar($id_comanda)
    {
        // Recupera a comanda com o ID fornecido
        $comanda = DB::select('SELECT * FROM Comanda WHERE id_comanda = ?', [$id_comanda]);

        if (empty($comanda)) {
            return redirect()->route('comandas')->with('error', 'Comanda não encontrada!');
        }

        // Recupera as bebidas disponíveis
        $bebidas = DB::select('SELECT * FROM Bebidas');

        // Recupera os itens já adicionados à comanda, incluindo o nome da bebida, o preço e a quantidade
        $itensComanda = DB::select('
            SELECT
                Bebidas.Nome AS nome_bebida,
                Bebidas.Preco AS preco_bebida,
                SUM(ItemComanda.Quantidade) AS quantidade_total
            FROM ItemComanda
            INNER JOIN Bebidas ON ItemComanda.ID_Bebida = Bebidas.ID_Bebida
            WHERE ItemComanda.ID_Comanda = ?
            GROUP BY Bebidas.Nome, Bebidas.Preco
', [$id_comanda]);

        // Depuração: Verifique o conteúdo de $itensComanda
        // dd($itensComanda); // Descomente para depurar e verifique se "quantidade" está vindo corretamente

        return view('acrescentar_item', [
            'comanda' => $comanda[0],
            'bebidas' => $bebidas,
            'itensComanda' => $itensComanda
        ]);
    }

    public function salvarItem(Request $request, $id_comanda)
    {
        // Validação
        $request->validate([
            'bebida' => 'required|integer|exists:Bebidas,ID_Bebida',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Insere o item na tabela de ItemComanda
        DB::insert(
            'INSERT INTO ItemComanda (ID_Comanda, ID_Bebida, Quantidade)
            VALUES (?, ?, ?)', 
            [
                $id_comanda, 
                $request->input('bebida'), 
                $request->input('quantidade')
            ]
        );

        return redirect()->route('comandas.acrescentar', ['id_comanda' => $id_comanda])
            ->with('success', 'Item acrescentado à comanda!');
    }

    public function confirmarPagamento($id_comanda)
    {
        // Deleta os itens da comanda da tabela ItemComanda
        DB::table('ItemComanda')
            ->where('ID_Comanda', $id_comanda)
            ->delete();

        // Redireciona para a página de comandas com sucesso
        return redirect()->route('comandas.acrescentar', ['id_comanda' => $id_comanda])
            ->with('success', 'Pagamento confirmado e itens deletados!');
    }

}
