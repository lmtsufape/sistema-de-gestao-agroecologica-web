<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller {

    public function index(){
        $user = User::find(Auth::id());
        if($user->associacao){
          return view('Associacao.home_associacao', [
            'associacao' => $user->associacao,
          ]);
        }
        return view('produtor.home', [
            'perfil' => $user->tipo_perfil,
        ]);
    }

}
