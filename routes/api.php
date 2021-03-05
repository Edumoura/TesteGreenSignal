<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registrar;
use App\Http\Controllers\Tarefa;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('alterar/cadastro/usuario', [Registrar::class, 'alterarcadastro']);
Route::post('alterar/verificar/cpf', [Registrar::class, 'editverificarcpf']);
Route::post('alterar/verificar/email', [Registrar::class, 'editverificaremail']);

Route::post('/cadastrar/tarefa', [Tarefa::class, 'cadastro']);
Route::post('/atualizar/status', [Tarefa::class, 'atualizarStatus']);
Route::post('/atualizar/colaborador', [Tarefa::class, 'atualizarColaborador']);
Route::post('/editar/tarefa', [Tarefa::class, 'editartarefa']);
Route::post('/excluir/tarefa', [Tarefa::class, 'excluirtarefa']);

