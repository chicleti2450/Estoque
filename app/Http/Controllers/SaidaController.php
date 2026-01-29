<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function store(Request $request)
    {
        $produto = Produto::find($request->id_produtos);

        if (!$produto) { //negação( se o produto não existe/verificação se existe)
            return response()->json(['message' => 'Produto não encontrado']);
        }
        $saida = Saida::create([
            "id_clientes" => $request->id_clientes,
            "id_produtos" => $request->id_produtos,
            "quantidade" => $request->quantidade
        ]);

        if (isset($request->quantidade)) {
            $produto->quantidade_estoque = $produto->quantidade_estoque - $saida->quantidade;
        }

        $produto->update();
        return response()->json($saida);
    }

    public function index(Request $request)
    {
        $saidas = Saida::all();

        return response()->json($saidas);
    }

    public function delete($id)
    {
        $saida = Saida::find($id);

        if ($saida == NULL) {
            return response()->json(['message' => 'Saída não encontrado']);
        }

        $produto = Produto::find($saida->id_produto);

        if (isset($produto)){
            $produto-> quantidade_estoque += $saida->quantidade;
        }

        $saida-> update();

        $saida->delete($id);

        return response()->json(['message' => 'Saída deletada com sucesso']);
    }
}
