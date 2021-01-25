<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Produtor;
use Illuminate\Support\Facades\Auth;
use App\Models\Endereco;
use App\Models\Ocs;
use Illuminate\Support\Facades\Hash;

class OcsController extends Controller
{
    public function listarProdutores(){
        $this->authorize('primeiroAcesso', User::class);
        $user = User::find(Auth::id());

        return view('Coordenador.listar_produtores', [
                'produtores' => $user->produtor->ocs->produtor,
                'perfil' => $user->produtor->user->tipo_perfil,
        ]);
    }
}
