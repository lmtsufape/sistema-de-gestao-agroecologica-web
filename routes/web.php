<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\User\CoordenadorController;

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
