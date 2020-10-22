<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CoordenadorController;
use App\Http\Controllers\User\PropriedadeController;

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

Route::get('/', function () {
    return view('/layouts/app');
});



Route::prefix('/user')->name('user')->namespace('User')->group(function(){
    Route::prefix('/coordenador')->name('.coordenador')->group(function () {
        Route::prefix('/criar_produtor')->name('.cadastrarProdutor')->group(function () {
            Route::get('/', [CoordenadorController::class, 'cadastroProdutor'])->middleware('auth');
            Route::post('/salvar', [CoordenadorController::class, 'salvarCadastrarProdutor'])->name('.salvar');
        });
        Route::prefix('/criar_coordenador')->name('.cadastrarCoordenador')->group(function () {
            Route::post('/salvar', [CoordenadorController::class, 'salvarCadastrarCoordenador'])->name('.salvar');
        });
        Route::prefix('/criar_ocs')->name('.cadastrarOcs')->group(function () {
            Route::get('/', [CoordenadorController::class, 'cadastroOcs']);
            Route::post('/salvar', [CoordenadorController::class, 'salvarCadastrarOcs'])->name('.salvar');
        });


        Route::get('/ver_produtor/{id_produtor}',  [CoordenadorController::class, 'verProdutor'])->name('.ver_produtor');
    });
    Route::get('/cadastrar_propriedade/',  [PropriedadeController::class, 'cadastrarPropriedade'])->name('.cadastrarPropriedade')->middleware('auth');
    Route::get('/ver_propriedade/',  [PropriedadeController::class, 'verPropriedade'])->name('.verPropriedade')->middleware('auth');;
    Route::post('/cadastrar_propriedade/salvar',  [PropriedadeController::class, 'salvarCadastrarPropriedade'])->name('.salvarCadastrarPropriedade');
});

//Todo: Criar controller home e a funçãod e erro!!!
//Route::get('/erro', 'HomeController@mostrarErro')->name('erro');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
