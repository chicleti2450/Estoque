<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function store(Request $request){
        $produto= Produto::create ([
            "marca"=> $request-> marca,
            "descricao"=> $request-> descricao, 
            "valor_unitario"=> $request-> valor_unitario,
            "quantidade_estoque"=> $request-> quantidade_estoque,
            "faixa_etaria_minima"=> $request-> faixa_etaria_minima
        ]);

        return response()->json ($produto);
    }

     public function index(Request $request){
        $produtos= Produto::all();

        return response()->json($produtos);
    }

    public function update(Request $request, $id) {
        $produto = Produto::find($id);

        if(!$produto){
            return response()->json('Produto atualizado com sucesso');
        }

        if(isset($produto)){
            $produto= $request-> marca;
        }

        if(isset($produto)){
            $produto= $request-> descricao;
        }

        if(isset($produto)){
            $produto= $request-> valor_unitario;
        }

        if(isset($produto)){
            $produto= $request-> quantidade_estoque;
        }

        if(isset($produto)){
            $produto= $request-> faixa_etaria_minima;
        }

        return response()->json($produto);
    }

    public function delete($id){
        $produto= Produto::find($id);

        if ($produto){
            return response()->json ('Produto não encontrado');
        }

        $produto-> delete;

        return response()-> json ('Poduto deletado com sucesso');
    }

    public function show($id){
        $produto= Produto::find($id);

        if($produto){
            return response()-> json ('Produto não encontrado');
        }

        return response()->json($produto);
    }
}
