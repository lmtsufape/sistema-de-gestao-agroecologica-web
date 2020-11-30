<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller {

    public function index(){
        $produtor = User::find(Auth::id());
        return view('produtor.home', [
            'perfil' => $produtor->tipo_perfil,
        ]);
    }

}
