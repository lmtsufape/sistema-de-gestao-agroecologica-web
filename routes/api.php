<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PassportAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [PassportAuthController::class,'register']);
Route::post('login', [PassportAuthController::class,'login']);
Route::get('index',[PassportAuthController::class,'index']);

Route::middleware('auth:api')->group(function(){
    Route::get('get-user',[PassportAuthController::class,'userInfo']);
    Route::post('cadastrar-propriedade',[PassportAuthController::class,'cadastrarPropriedade']);
    Route::get('listar-reunioes',[PassportAuthController::class,'listarReunioes']);
    Route::post('agendar-reuniao',[PassportAuthController::class,'agendarReuniao']);
});
