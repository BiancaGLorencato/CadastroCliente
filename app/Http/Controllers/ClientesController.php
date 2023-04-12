<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function getClients($page)
    {
        $cliente = new Cliente();
        $clientesConsulta = $cliente->orderBy('created_at', 'desc')->forPage($page,15)->get();
        return json_encode($clientesConsulta);
    }

    public function getClienteCount()
    {
        $cliente = new Cliente();
        $count = $cliente->get()->count();
        return json_encode($count);
    }


    public function getClientesFiltro(Request $request)
    {
        $cliente = new Cliente();

        $filtros = explode(',',$request->filtros);
        $dados = explode(',', $request->dados);

        $i = 0;

        foreach($filtros as $filtro){
            $cliente = $cliente->where($filtro,  '=',  $dados[$i]);
            $i++;
        }

        $clientesConsulta = $cliente->get();
        return json_encode($clientesConsulta);
    }
    
    public function create(Request $request) 
    {
        $cliente = new Cliente();

        $clienteExiste = $cliente->where('cpf', $request->cpf)->count();
        if($clienteExiste <= 0){
            $cliente->id =  Str::random(10);
            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->dataNascimento = $request->dataNascimento;
            $cliente->endereco = $request->endereco;
            $cliente->estado = $request->estado;
            $cliente->cidade = $request->cidade;
            $cliente->sexo = $request->sexo;
            $cliente->created_at = now();
            $cliente->save();
            return response()->json(['Cliente Cadastrado', 201]);

    
        }

        return response()->json(['Cliente já cadastrado no sistema', 200]);

        
    }



}
