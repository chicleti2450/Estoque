<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function store(Request $request)
    {

        $produto = Produto::find($request->id_produto);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado']);
        }

         $entrada = Entrada::create([
            'id_produto' => $request->id_produto,
            'quantidade' => $request->quantidade
        ]);

        if (isset($request->quantidade)) {
            $produto->quantidade_estoque = $produto->quantidade_estoque + $entrada->quantidade;
        }

        $produto->update();

        return response()->json($entrada);
    }

    public function index(Request $request)
    {
        $entradas = Entrada::all();

        return response()->json($entradas);
    }

    public function delete($id)
    {
        $entrada = Entrada::find($id);

        if ($entrada == NULL) {
            return response()->json(['Message' => 'Entrada não encontrado']);
        }

        $produto = Produto::find($entrada->id_produto);

        if (isset($produto)) {
            $produto->quantidade_estoque -= $entrada->quantidade;
        }

        $produto->update();

        $entrada->delete($id);

        return response()->json(['Message' => 'Entrada deletada com sucesso']);
    }
}
