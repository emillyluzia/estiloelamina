<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('store', [ServicoController::class, 'store']);

Route::get(
    'find/{id}',
    [ServicoController::class, 'pesquisarPorId']
);

Route::get('find/cpf/{cpf}', [ServicoController::class, 'pesquisarPorCpf']);
Route::get('all', [ServicoController::class, 'retornarTodos']);

Route::post('nome', [ServicoController::class, 'pesquisarPorNome']);


Route::delete('delete/{id}', [ServicoController::class, 'excluir']);

Route::put('update', [ServicoController::class, 'update']);

//------------------------------------------------------------------------------CLIENTES--------------------------------------------------------------------------------//

Route::post('store/Cliente', [ClienteController::class, 'store']); //Cadastrar

Route::get('all/Cliente', [ClienteController::class, 'retornarTodosClientes']); //vizualizar

Route::post('nome/Cliente', [ClienteController::class, 'pesquisarClientePorNome']);
Route::post('cpf/Cliente/{cpf}', [ClienteController::class, 'pesquisarClientePorCpf']);
Route::post('celular/Cliente', [ClienteController::class, 'pesquisarClientePorCelular']);
Route::post('email/Cliente', [ClienteController::class, 'pesquisarClientePorEmail']);


Route::put('update/Cliente', [ClienteController::class, 'updateCliente']); //atualizar e editar

Route::delete('delete/Cliente/{id}', [ClienteController::class, 'excluirCliente']); //excluir



//------------------------------------------------------------------------------PROFISSIONAL--------------------------------------------------------------------------------//

Route::post('store/Profissional', [ProfissionalController::class, 'storeProfissional']); //Cadastrar

Route::get('all/Profissional', [ProfissionalController::class, 'retornarTodosProfissionais']); //vizualizar

Route::post('nome/Profissional', [ProfissionalController::class, 'pesquisarPorNomeProfissional']);
Route::post('cpf/Profissional/{cpf}', [ProfissionalControllerler::class, 'pesquisarPorCpfProfissional']);
Route::post('celular/Profissional', [ProfissionalController::class, 'pesquisarProfissionalPorCelular']);
Route::post('email/Profissional', [ProfissionalController::class, 'pesquisarProfissionalPorEmail']);


Route::put('update/Profissional', [ProfissionalController::class, 'updateProfissional']); //atualizar e editar

Route::delete('delete/Profissional/{id}', [ProfissionalController::class, 'excluirProfissional']); //excluir

