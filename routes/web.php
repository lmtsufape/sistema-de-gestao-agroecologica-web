<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CoordenadorController;
use App\Http\Controllers\User\PropriedadeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\OcsController;
use App\Http\Controllers\AssociacaoController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'log'])->name('home2');

Route::prefix('/associacao')->name('associacao')->namespace('Associacao')->group(function(){
  Route::prefix('/criar')->name('.cadastrarAssociacao')->group(function () {
      Route::get('/', [AssociacaoController::class, 'cadastroAssociacao']);
      Route::post('/salvar', [AssociacaoController::class, 'salvarCadastroAssociacao'])->name('.salvar');
  });

  Route::prefix('/editar')->name('.editarAssociacao')->group(function () {
      Route::get('/', [AssociacaoController::class, 'editarAssociacao'])->middleware('auth');
      Route::post('/salvar', [AssociacaoController::class, 'salvarEditarAssociacao'])->name('.salvar')->middleware('auth');
  });

  Route::prefix('/ver')->name('.verAssociacao')->group(function () {
      Route::get('/', [AssociacaoController::class, 'verAssociacao'])->middleware('auth');
  });

  Route::prefix('/senha')->name('.alterarSenha')->group(function () {
      Route::get('/', [AssociacaoController::class, 'alterarSenha'])->middleware('auth');
      Route::post('/salvar', [AssociacaoController::class, 'salvarAlterarSenha'])->name('.salvar')->middleware('auth');
  });


  Route::prefix('/criar_ocs')->name('.cadastrarOcs')->group(function () {
      Route::get('/', [AssociacaoController::class, 'cadastrarOcs'])->middleware('auth');
      Route::post('/salvar', [AssociacaoController::class, 'salvarCadastrarOcs'])->name('.salvar')->middleware('auth');
  });

  Route::prefix('/remover_ocs')->name('.removerOcs')->group(function () {
      Route::get('/', [AssociacaoController::class, 'verRemover'])->middleware('auth');
      Route::get('/{id}', [AssociacaoController::class, 'removerOcs'])->name('.salvar')->middleware('auth');
  });

  Route::prefix('/listar')->name('.listarOcs')->group(function () {
      Route::get('/', [AssociacaoController::class, 'listarOcs'])->middleware('auth');
  });

  Route::prefix('/info_ocs')->name('.infoOcs')->group(function () {
    Route::get('/', [AssociacaoController::class, 'editarOcs'])->middleware('auth');
    Route::post('/salvar', [AssociacaoController::class, 'salvarEditarOcs'])->name('.salvar')->middleware('auth');
  });

  Route::prefix('/criar_membro')->name('.cadastrarMembro')->group(function () {
      Route::get('/', [AssociacaoController::class, 'cadastrarMembro'])->middleware('auth');
      Route::post('/salvar', [AssociacaoController::class, 'salvarCadastrarMembro'])->name('.salvar')->middleware('auth');
  });

  Route::prefix('/muda_perfil/{id}')->name('.mudaPerfil')->group(function () {
    Route::get('/', [CoordenadorController::class, 'mudaPerfil'])->middleware('auth');
  });
});


Route::prefix('/user')->name('user')->namespace('User')->group(function(){
    Route::prefix('/coordenador')->name('.coordenador')->group(function () {
        Route::prefix('/criar_produtor')->name('.cadastrarProdutor')->group(function () {
            Route::get('/', [CoordenadorController::class, 'cadastroProdutor'])->middleware('auth');
            Route::post('/salvar', [CoordenadorController::class, 'salvarCadastrarProdutor'])->name('.salvar');
        });



        Route::prefix('/agendar_reuniao')->name('.agendarReuniao')->group(function(){
            Route::get('/', [CoordenadorController::class, 'agendamentoReuniao'])->middleware('auth');
            Route::post('/salvar', [CoordenadorController::class, 'salvarCadastrarAgendamentoReuniao'])->name('.salvar')->middleware('auth');
        });

        Route::prefix('/registrar_reuniao/{id_reuniao}')->name('.registrarReuniao')->group(function (){
            Route::get('/', [CoordenadorController::class, 'cadastroReuniao'])->middleware('auth');
            Route::post('/salvar', [CoordenadorController::class, 'salvarCadastrarReuniao'])->name('.salvar')->middleware('auth');
        });

        Route::get('/cancelarReuniao/{reuniao_agendada_id}', [CoordenadorController::class, 'cancelarReuniaoAgendada'])->name('.cancelarReuniao')->middleware('auth');

        Route::prefix('/ver_reuniao/{id_reuniao}')->name('.verReuniao')->group(function(){
            Route::get('/', [CoordenadorController::class, 'verReuniao'])->middleware('auth');
        });

        Route::prefix('/editar_reuniao/{id_reuniao}')->name('.editarReuniao')->group(function(){
            Route::get('/', [CoordenadorController::class, 'editarReuniao'])->middleware('auth');
            Route::post('/salvar', [CoordenadorController::class, 'salvarEditarReuniao'])->name('.salvar')->middleware('auth');
        });

        Route::prefix('/reuniao')->name('.reunioes')->group(function(){
          Route::get('/criarReuniao', [CoordenadorController::class, 'criarReuniao'])->name('.criar')->middleware('auth');
          Route::get('/cancelarReuniao', [CoordenadorController::class, 'cancelarReuniaoSimples'])->name('.cancelar')->middleware('auth');
          Route::get('/retificar', [CoordenadorController::class, 'retificarReuniaoSimples'])->name('.retificar')->middleware('auth');
          Route::get('/registrar', [CoordenadorController::class, 'registarReuniaoSimples'])->name('.registrar')->middleware('auth');
        });


        Route::get('/ver_ocs',  [CoordenadorController::class, 'verOcs'])->name('.ver_ocs')->middleware('auth');
        Route::get('/listarReunioes', [CoordenadorController::class, 'listarReunioes'])->name('.listar_reunioes')->middleware('auth');
        Route::get('/ver_Reuniao/{id_reuniao}', [CoordenadorController::class, 'verReuniao'])->name('.ver_reuniao')->middleware('auth');
        Route::get('/listar_produtores',  [OcsController::class, 'listarProdutores'])->name('.listar_produtores')->middleware('auth');

    });

    Route::get('/ver_perfil',  [UserController::class, 'verPerfil'])->name('.ver_perfil')->middleware('auth');
    Route::get('/primeiro_acesso',  [UserController::class, 'primeiroAcessoTela'])->name('.primeiro_acesso')->middleware('auth');
    Route::post('/primeiro_acesso/salvar',  [UserController::class, 'primeiroAcesso'])->name('.primeiro_acesso_salvar')->middleware('auth');

    Route::prefix('/editar_perfil')->name('.editarPerfil')->group(function(){
        Route::get('/', [UserController::class, 'editarPerfil'])->middleware('auth');
        Route::post('/salvar', [UserController::class, 'salvarEditarPerfil'])->name('.salvar')->middleware('auth');
    });

    Route::prefix('/senha')->name('.alterarSenha')->group(function () {
        Route::get('/', [UserController::class, 'alterarSenha'])->middleware('auth');
        Route::post('/salvar', [UserController::class, 'salvarAlterarSenha'])->name('.salvar')->middleware('auth');
    });

    Route::get('/cadastrar_propriedade',  [PropriedadeController::class, 'cadastrarPropriedade'])->name('.cadastrarPropriedade')->middleware('auth');
    Route::get('/ver_propriedade',  [PropriedadeController::class, 'verPropriedade'])->name('.verPropriedade')->middleware('auth');;
    Route::post('/cadastrar_propriedade/salvar',  [PropriedadeController::class, 'salvarCadastrarPropriedade'])->name('.salvarCadastrarPropriedade')->middleware('auth');

    Route::prefix('/editar_propriedade')->name('.editarPropriedade')->group(function () {
        Route::get('/',  [PropriedadeController::class, 'editarPropriedade'])->middleware('auth');
        Route::post('/salvar', [PropriedadeController::class, 'salvarEditarPropriedade'])->name('.salvar')->middleware('auth');
    });

    Route::prefix('/manejo')->name('.manejo')->namespace('manejo')->group(function(){
        Route::get('/cadastrar',  [PropriedadeController::class, 'cadastrarManejo'])->name('.cadastrar')->middleware('auth');
        Route::post('/salvar',  [PropriedadeController::class, 'salvarCadastrarManejo'])->name('.salvar')->middleware('auth');
    });

    Route::prefix('/produto')->name('.produto')->namespace('produto')->group(function(){
        Route::get('/cadastrar',  [PropriedadeController::class, 'cadastrarProduto'])->name('.cadastrar')->middleware('auth');
        Route::post('/salvar',  [PropriedadeController::class, 'salvarCadastrarProduto'])->name('.salvar')->middleware('auth');
    });

    Route::prefix('/canteiroDeProducao')->name('.canteiroProducao')->namespace('CanteiroProducao')->group(function(){
        Route::post('/salvar',  [PropriedadeController::class, 'salvarCadastrarCanteiroDeProducao'])->name('.salvar')->middleware('auth');
        Route::get('/listar',  [PropriedadeController::class, 'listarCanteiroDeProducao'])->name('.listar')->middleware('auth');
        Route::prefix('/producao')->name('.producao')->namespace('producao')->group(function(){
            Route::get('{id_canteiro}/cadastrar',  [PropriedadeController::class, 'cadastrarProducao'])->name('.cadastrar')->middleware('auth');
            Route::get('{id_producao}/ver',  [PropriedadeController::class, 'verProducao'])->name('.ver')->middleware('auth');
            Route::get('{id_producao}/remover',  [PropriedadeController::class, 'removerProducao'])->name('.remover')->middleware('auth');
            Route::post('/salvar',  [PropriedadeController::class, 'salvarCadastrarProducao'])->name('.salvar')->middleware('auth');
            Route::get('{id_producao}/editar',  [PropriedadeController::class, 'editarProducao'])->name('.editar')->middleware('auth');
            Route::post('editar/salvar',  [PropriedadeController::class, 'salvarEditarProducao'])->name('.salvarEditar')->middleware('auth');
        });
    });
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/erro/{msg_erro}', [App\Http\Controllers\Controller::class, 'erro'])->name('erro');
