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
    public function index()
    {
        $produtor = User::find(Auth::id());
        return view('home', [
            'perfil' => $produtor->tipo_perfil,
        ]);
    }

    public function log(){
        return redirect()->route('login');
    }
}
