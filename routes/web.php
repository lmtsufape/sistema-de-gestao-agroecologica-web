<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\User\CoordenadorController;
=======
use app\Http\Controllers\User\CoordenadorController;
>>>>>>> ad305c8ae3ba03ed4d3502e7f6fceb74defa2978

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

<<<<<<< HEAD


Route::prefix('/user')->name('user')->namespace('User')->group(function(){
    Route::prefix('/coordenador')->name('.coordenador')->group(function () {
        Route::prefix('/criar_produtor')->name('.cadastrarProdutor')->group(function () {
            Route::get('/', [CoordenadorController::class, 'cadastroProdutor']);
            Route::post('/salvar', [CoordenadorController::class, 'salvarCadastrarProdutor'])->name('.salvar');
        });

        Route::get('/ver_produtor/{id_produtor}',  [CoordenadorController::class, 'verProdutor'])->name('.ver_produtor');

    });

});

//Todo: Criar controller home e a funçãod e erro!!!
//Route::get('/erro', 'HomeController@mostrarErro')->name('erro');
=======
Route::get('/cadastrar_ocs', function () {
    return view('cadastro_ocs');
});

Route::get('/cadastro_produtor', function () {
    return view('user/Coordenador/criar_produtor');
});

Route::get('/home', function () {
    return view('user/Coordenador/home');
});

/*Route::get('user/cadastro_produtor', [CoordenadorController::class, 'cadastroProdutor']);/*
>>>>>>> ad305c8ae3ba03ed4d3502e7f6fceb74defa2978
