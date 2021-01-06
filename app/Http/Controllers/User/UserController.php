<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Endereco;
use App\Models\Ocs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function verPerfil() {
        $produtor = User::find(Auth::id());
        if ($produtor->primeiro_acesso) {
            return redirect()->back();
        }
        return view('Produtor.ver_perfil', [
            'produtor' => $produtor
        ]);
    }

    public function salvarEditarPerfil(Request $request){
        $entrada = $request->all();

        $produtor = User::find(Auth::id());

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
        ];


        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_produtor = Validator::make($entrada, User::$regras_validacao_editar, $messages);
        if ($validator_produtor->fails()) {
            return redirect()->back()
                             ->withErrors($validator_produtor)
                             ->withInput();
        }


        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $produtor->fill($entrada);
        $produtor->endereco_id = $endereco->id;

        $produtor->save();

        return redirect()->route('user.ver_perfil');
    }

    public function primeiroAcessoTela(){
        $produtor = User::find(Auth::id());
        return view('Produtor.primeiro_acesso', [
            'produtor' => $produtor,
        ]);
    }

    public function primeiroAcesso(Request $request){
        $entrada = $request->all();

        $produtor = User::find(Auth::id());

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
        ];


        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_produtor = Validator::make($entrada, User::$regras_validacao_primeiro_acesso, $messages);
        if ($validator_produtor->fails()) {
            return redirect()->back()
                             ->withErrors($validator_produtor)
                             ->withInput();
        }


        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $produtor->fill($entrada);
        $produtor->endereco_id = $endereco->id;
        $produtor->primeiro_acesso = false;
        $produtor->password = Hash::make($entrada['password']);

        $produtor->save();

        return redirect()->route('user.ver_perfil');
    }


}
