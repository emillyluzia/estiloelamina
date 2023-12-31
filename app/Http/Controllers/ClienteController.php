<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(ClienteRequest $request){

        $cliente = Cliente::create([
           

            'id' => $request->id,
            'nome' => $request->nome,
            'celular' => $request->celular,
            'e-mail' => $request->email,
            'cpf' => $request->cpf,
            'DatadeNascimento' => $request->DatadeNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'senha' => $request->senha


        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente Cadastrado com sucesso",
            "data" => $cliente

        ], 200);
    }

    public function pesquisarPorIdCliente($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente == null) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não cadastrado"
            ]);
        }
        return response()->json([
            ' status' => true,
            'data' => $cliente
        ]);
    }

    public function retornarTodosCliente()
    {
        $cliente = Cliente::all();
        return response()->json([
            ' status' => true,
            'data' => $cliente
        ]);
    }

   
    public function pesquisarPorNomeCliente(Request $request)
    {
        $cliente = Cliente::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($cliente) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $cliente
            ]);
        }
    }
    public function excluirCliente($id)
    {
        $cliente = Cliente::find($id);

        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não Sencontrado"
            ]);
        }

        $cliente->deleteCliente();
        return response()->json([
            'status' => true,
            'message' => "Cliente excluido com sucesso"
        ]);
    }

    public function updateCliente(Request $request)
    {
        $cliente = Cliente::find($request->id);
        if (!isset($cliente)) {
            return response()->json([
                'status' => false,
                'message' => "Cliente não Sencontrado"
            ]);
        }

        if (isset($request->id)) {
            $cliente->id = $request->id;
        }

        if (isset($request->nome)) {
            $cliente->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $cliente->celular = $request->celular;
        }
        if (isset($request->email)) {
            $cliente->email = $request->email;
        }
        if (isset($request->cpf)) {
            $cliente->cpf = $request->cpf;
        }
        if (isset($request->DatadeNascimento)) {
            $cliente->DatadeNascimento = $request->DatadeNascimento;
        }
        if (isset($request->cidade)) {
            $cliente->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $cliente->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $cliente->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $cliente->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $cliente->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $cliente->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $cliente->cep = $request->cep;
        }
        if (isset($request->senha)) {
            $cliente->senha = $request->senha;
        }


        $cliente->update();

        return response()->json([
            'status' => true,
            'message' => 'Cliente atualizado.'
        ]);
    }

}
