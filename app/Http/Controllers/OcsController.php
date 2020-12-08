<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Endereco;
use App\Models\Ocs;
use Illuminate\Support\Facades\Hash;

class OcsController extends Controller
{
    public function listarProdutores(){
        $produtor = user::find(Auth::id());
        $ocs = Ocs::find($produtor->id_ocs);

        return view('Coordenador.listar_produtores', [
                'produtores' => $ocs->produtor,
                'perfil' => $produtor->tipo_perfil,
        ]);
    }
}
