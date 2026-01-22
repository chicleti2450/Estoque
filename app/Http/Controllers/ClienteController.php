<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request){
        $cliente = Cliente::create([
            "nome"=> $request-> nome,
            "cpf"=> $request-> cpf,
            "idade"=> $request-> idade
        ]);

        return response()-> json($cliente);
    }

    public function index(Request $request){
        $clientes= cliente::all();

        return response()-> json($clientes);
    }

    public function update(Request $request, $id){
        $cliente= cliente::find($id);

        if ($cliente){
            return response()-> json ('Cliente não encontrado');
        }

        if(isset($cliente)){
            $cliente= $request -> nome;
        }

        if(isset($cliente)){
            $cliente= $request-> cpf;
        }

        if(isset($cliente)){
            $cliente= $request-> idade;
        }

        return response()-> json($cliente);
    }

    public function delete($id){
        $cliente= Cliente::find($id);

        if($cliente){
        return response()-> json ("Produto não encontrado");
        } 

         $cliente-> delete;

         return response()-> json ("Produto deletado com sucesso");
    }
}