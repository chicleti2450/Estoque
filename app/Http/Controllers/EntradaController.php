<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function store(Request $request){
        $entrada = Entrada::create ([
            "id_produto"=> $request-> id_produto,
            "quantidade"=> $request-> quantidade
        ]);

        return response()->json ($entrada);
    }

    public function index(Request $request){
        $entradas = Entrada::all();

        return response()->json ($entradas);
    }

    public function delete($id){
        $entrada= Entrada::find($id);

        if (!$entrada){
            return response()-> json (['Message' => 'Produto não encontrado']);
        }

        $entrada->delete($id);

        return response()-> json (['Message' => 'Produto deletado com sucesso']);
    }
}
