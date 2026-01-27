<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function store(Request $request){
        $saida = Saida::create ([
            "id_clientes" => $request -> id_clientes,
            "id_produtos" => $request -> id_produtos,
            "quantidade" => $request -> quantidade
        ]);

        return response()-> json ($saida);
    }

    public function index(Request $request){
        $saidas = Saida::all(); 

        return response()-> json ($saidas);
    }

    public function delete($id){
        $saida = Saida::find($id);

        if (!$saida){
            return response()-> json (['Message'=> 'Produto não encontrado']);
        }

        $saida-> delete($id);

        return response()-> json (['Message'=> 'Produto deletado com sucesso']);
    }

}