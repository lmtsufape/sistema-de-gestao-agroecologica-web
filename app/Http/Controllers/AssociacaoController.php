<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

        $validator_associaco = Validator::make($entrada, Associacao::$regras_validacao_criar, $messages);
        if ($validator_associaco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_associaco)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $associacao = new Associacao;
        $associacao->fill($entrada);
        $associacao->endereco_id = $endereco->id;
        $associacao->unidade_federacao = $endereco->estado;
        $associacao->password = Hash::make($entrada['password']);
        $associacao->save();


        return redirect()->route('associacao.home');
    }

    public function homeAssociacao(){
      $associacao = Associacao::find(1);
      return view('Associacao.home_associacao', [
        'associacao' => $associacao,
      ]);
    }

    public function editarOcs($id){
      $ocs = Ocs::find($id);
      return view('Associacao.editar_ocs', [
        'ocs' => $ocs,
      ]);

    }





    public function salvarCadastrarOcs(Request $request){
        $entrada = $request->all();

        #AQUI È PRA VER SE A ASSOCIAÇÂO TA LOGADAAAAAA
        #$coordenadorlogado = User::find(Auth::id());

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
