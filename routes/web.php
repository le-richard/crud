<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [ClienteController::class, 'listarCliente']);

Route::get('/cadastrar', [ClienteController::class, 'viewCadastrar'])->name('cadastrar');

Route::post('/cadastrar', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar.novo');

Route::get('/visualizar/{id}', [ClienteController::class, 'viewVisualizarCliente'])->name('visualizar');

Route::get('/alterar/{id}', [ClienteController::class, 'viewAlterarCliente']);

Route::post('/alterar/{id}', [ClienteController::class, 'alterarCliente'])->name('alterar');

Route::post('/excluir', [ClienteController::class, 'excluirCliente'])->name('excluir');