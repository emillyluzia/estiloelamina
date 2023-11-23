<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request)
    {

        $profissional = Profissional::create([


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
            "message" =>"Profissional Cadastrado com sucesso",
            "data" => $profissional

        ], 200);
    }

    public function pesquisarPorIdCliente($id)
    {
        $profissional = Profissional::find($id);

        if ($profissional == null) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não cadastrado"
            ]);
        }
        return response()->json([
            ' status' => true,
            'data' => $profissional
        ]);
    }

    public function retornarTodosCliente()
    {
        $profissional = Profissional::all();
        return response()->json([
            ' status' => true,
            'data' => $profissional
        ]);
    }


    public function pesquisarPorNomeCliente(Request $request)
    {
        $profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($profissional) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $profissional
            ]);
        }
    }
    public function excluirCliente($id)
    {
        $profissional = Profissional::find($id);

        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não Sencontrado"
            ]);
        }

        $profissional->deleteCliente();
        return response()->json([
            'status' => true,
            'message' => "Profissional excluido com sucesso"
        ]);
    }

    public function updateCliente(Request $request)
    {
        $profissional = Profissional::find($request->id);
        if (!isset($profissional)) {
            return response()->json([
                'status' => false,
                'message' => "Profissional não Sencontrado"
            ]);
        }

        if (isset($request->id)) {
            $profissional->id = $request->id;
        }
        if (isset($request->nome)) {
            $profissional->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $profissional->celular = $request->celular;
        }
        if (isset($request->email)) {
            $profissional->email = $request->email;
        }
        if (isset($request->cpf)) {
            $profissional->cpf = $request->cpf;
        }
        if (isset($request->DatadeNascimento)) {
            $profissional->DatadeNascimento = $request->DatadeNascimento;
        }
        if (isset($request->cidade)) {
            $profissional->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $profissional->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $profissional->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $profissional->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $profissional->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $profissional->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $profissional->cep = $request->cep;
        }
        if (isset($request->senha)) {
            $profissional->senha = $request->senha;
        }
        


        $profissional->update();

        return response()->json([
            'status' => true,
            'message' => 'Profissional atualizado.'
        ]);
    }
}
