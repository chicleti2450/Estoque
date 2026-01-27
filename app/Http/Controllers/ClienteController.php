<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request){

    $cliente = Cliente::where ('cpf', '=', $request->cpf)->get(); //armazenar todos os cpfs

        if ($cliente->count() == 1){
            return response()-> json (['message' => 'CPF duplicado']);
        }

        $cliente = Cliente::create([
            "nome"=> $request-> nome,
            "cpf"=> $request-> cpf,
            "idade"=> $request-> idade
        ]);

         if ($cliente){
            
        }

        return response()-> json($cliente);
       
    }

    public function index(Request $request){
        $clientes= cliente::all();

        return response()-> json($clientes);
    }

}