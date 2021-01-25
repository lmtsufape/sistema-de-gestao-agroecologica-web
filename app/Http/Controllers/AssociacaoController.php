<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produtor;
use App\Models\Associacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Endereco;
use App\Models\Ocs;
use Illuminate\Support\Facades\Hash;

class AssociacaoController extends Controller
{

    public function cadastroAssociacao(){
      return view('Associacao.criar_associacao');
    }

    public function salvarCadastroAssociacao(Request $request) {
        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'unique' => 'O :attribute já existe',
        ];


        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_user = Validator::make($entrada, User::$regras_validacao_criar_associacao, $messages);
        if ($validator_user->fails()) {
            return redirect()->back()
                             ->withErrors($validator_user)
                             ->withInput();
        }

        $validator_associaco = Validator::make($entrada, Associacao::$regras_validacao_criar, $messages);
        if ($validator_associaco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_associaco)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $user = new User;
        $user->fill($entrada);
        $user->endereco_id = $endereco->id;
        $user->tipo_perfil = "Associacao";
        $user->password = Hash::make($entrada['password']);
        $user->save();

        $associacao = new Associacao;
        $associacao->fill($entrada);
        $associacao->user_id =  $user->id;
        $associacao->unidade_federacao = $endereco->estado;

        $associacao->save();

        if(!$associacao->id){
          Endereco::find($endereco->id)->delete();
          User::find($user->id)->delete();
        }


        return redirect()->route('home');
    }


    public function editarOcs($id){
      $this->authorize('gerenciar', User::class);
      $ocs = Ocs::find($id);
      return view('Associacao.editar_ocs', [
        'ocs' => $ocs,
      ]);

    }

    public function editarAssociacao(){
      $this->authorize('gerenciar', User::class);
      $associacao = User::find(Auth::id());
      return view('Associacao.info_associacao', [
        'associacao' => $associacao->associacao,
      ]);

    }



    public function salvarCadastrarCoordenador(Request $request) {
        $this->authorize('gerenciar', User::class);
        $entrada = $request->all();


        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'unique' => 'O :attribute já existe',
        ];

        $validator_user = Validator::make($entrada, User::$regras_validacao_criar_produtor, $messages);
        if ($validator_user->fails()) {
            return redirect()->back()
                             ->withErrors($validator_user)
                             ->withInput();
        }

        $validator_coordenador = Validator::make($entrada, Produtor::$regras_validacao_criar_coordenador, $messages);
        if ($validator_coordenador->fails()) {
            return redirect()->back()
                             ->withErrors($validator_coordenador)
                             ->withInput();
        }

        $user = new User;
        $user->fill($entrada);
        $user->tipo_perfil = "Coordenador";
        $user->password = Hash::make('123123123');
        $user->save();

        $coordenador = new Produtor;
        $coordenador->fill($entrada);
        $coordenador->primeiro_acesso = true;
        $coordenador->user_id = $user->id;
        $coordenador->ocs_id = $entrada['ocs_id'];
        $coordenador->save();

        if(!$coordenador->id){
          User::find($user->id)->delete();
        }

        return redirect()->back();
    }



    public function salvarCadastrarOcs(Request $request){
        $this->authorize('gerenciar', User::class);
        $entrada = $request->all();


        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'unique' => 'O :attribute já existe',
        ];


        $validator_ocs = Validator::make($entrada, Ocs::$regras_validacao_editar, $messages);
        if ($validator_ocs->fails()) {
            return redirect()->back()
                             ->withErrors($validator_ocs)
                             ->withInput();
        }

        $ocs = new Ocs;
        $ocs->fill($entrada);
        $ocs->associacao_id = $entrada['associacao_id'];

        $ocs->save();

        return redirect()->back();
    }



}
