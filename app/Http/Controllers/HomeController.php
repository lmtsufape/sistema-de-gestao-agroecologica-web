<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GNAHotelSolutions\Weather\Weather;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(){
         $user = User::find(Auth::id());
         if($user->tipo_perfil == "Associacao"){
           return view('Associacao.home_associacao', [
             'associacao' => $user->associacao,
           ]);
         }
         if($user->produtor->primeiro_acesso){
           return view('Produtor.primeiro_acesso', [
               'produtor' => $user,
           ]);
         }
         return view('home', [
             'perfil' => $user->tipo_perfil,
         ]);
     }
    public function log(){
        return redirect()->route('login');
    }
}
