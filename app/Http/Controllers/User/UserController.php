<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Produtor;
use App\Models\Endereco;
use App\Models\Ocs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function verPerfil() {
        $this->authorize('primeiroAcesso', User::class);
        $produtor = Auth::user();
        if ($produtor->produtor->primeiro_acesso) {
            return redirect()->back();
        }
        return view('Produtor.ver_perfil', [
            'produtor' => $produtor
        ]);
    }

    public function editarPerfil() {
        $this->authorize('primeiroAcesso', User::class);
        $produtor = Auth::user();
        if ($produtor->produtor->primeiro_acesso) {
            return redirect()->back();
        }
        return view('Produtor.editar_perfil', [
            'produtor' => $produtor
        ]);
    }

    public function alterarSenha(){
      $this->authorize('primeiroAcesso', User::class);
      $produtor = Auth::user();
      return view('Produtor.atualizar_senha', [
        'associacao' => $produtor->produtor,
      ]);
    }

    public function salvarAlterarSenha(Request $request){
      $this->authorize('primeiroAcesso', User::class);
      $entrada = $request->all();
      $user = Auth::user();

      $messages = [
          'required' => 'O campo :attribute é obrigatório.',
          'password.required' => 'A senha é obrigatória.',
      ];

      $validator_user = Validator::make($entrada, User::$regras_validacao_senha, $messages);
      if ($validator_user->fails()) {
          return redirect()->back()
                           ->withErrors($validator_user)
                           ->withInput();
      }

      $user->password = Hash::make($entrada['password']);
      $user->save();

      return redirect()->route('user.ver_perfil')->with('Sucesso', 'Edição finalizada com sucesso!');
    }

    public function salvarEditarPerfil(Request $request){
        $this->authorize('primeiroAcesso', User::class);
        $entrada = $request->all();

        $produtor = Auth::user();

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

        $validator_user = Validator::make($entrada, User::$regras_validacao_editar, $messages);
        if ($validator_user->fails()) {
            return redirect()->back()
                             ->withErrors($validator_user)
                             ->withInput();
        }

        $validator_produtor = Validator::make($entrada, Produtor::$regras_validacao_editar, $messages);
        if ($validator_produtor->fails()) {
            return redirect()->back()
                             ->withErrors($validator_produtor)
                             ->withInput();
        }


        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $produtor->produtor->fill($entrada);
        $produtor->endereco_id = $endereco->id;
        $produtor->fill($entrada);

        if($entrada['password']){
          $produtor->password = Hash::make($entrada['password']);
        }

        $produtor->save();
        $produtor->produtor->save();

        return redirect()->route('user.ver_perfil');
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

        $validator_user = Validator::make($entrada, User::$regras_validacao_primeiro_acesso, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }


        $validator_produtor = Validator::make($entrada, Produtor::$regras_validacao_primeiro_acesso, $messages);
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
        $produtor->password = Hash::make($entrada['password']);


        $produtor->produtor->fill($entrada);
        $produtor->produtor->primeiro_acesso = false;

        $produtor->produtor->save();
        $produtor->save();

        return redirect()->route('user.ver_perfil');
    }


}
