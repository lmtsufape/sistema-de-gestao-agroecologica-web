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

    public function salvarEditarAssociacao(Request $request) {
        $this->authorize('gerenciar', User::class);
        $entrada = $request->all();
        $user = Auth::user();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
            'email.required' => 'O CNPJ é obrigatório',
            'email.min' => 'O CNPJ deve ter 14 numeros',
            'email.max' => 'O CNPJ deve ter 14 numeros',
            'email.unique' => 'O CNPJ já foi cadastrado',
            'unique' => 'O :attribute já existe',
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

        $validator_associaco = Validator::make($entrada, Associacao::$regras_validacao_editar, $messages);
        if ($validator_associaco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_associaco)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $user->fill($entrada);
        $user->endereco_id = $endereco->id;
        $user->save();

        $user->associacao->fill($entrada);
        $user->associacao->unidade_federacao = $endereco->estado;

        $user->associacao->save();

        return redirect()->route('associacao.verAssociacao')->with('Sucesso', 'Edição finalizada com sucesso!');
    }


    public function salvarCadastroAssociacao(Request $request) {
        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
            'email.required' => 'O CNPJ é obrigatório',
            'email.min' => 'O CNPJ deve ter 14 numeros',
            'email.max' => 'O CNPJ deve ter 14 numeros',
            'email.unique' => 'O CNPJ já foi cadastrado',
            'email2.unique' => 'O email já existe',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
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


    public function editarOcs(){
      $this->authorize('gerenciar', User::class);
      $associacao = User::find(Auth::id());
      return view('Associacao.editar_ocs', [
        'ocs' => $associacao->associacao->ocs,
      ]);

    }

    public function cadastrarMembro(){
      $this->authorize('gerenciar', User::class);
      $associacao = User::find(Auth::id());
      return view('Associacao.novo_membro', [
        'ocs' => $associacao->associacao->ocs,
      ]);

    }

    public function editarAssociacao(){
      $this->authorize('gerenciar', User::class);
      $associacao = User::find(Auth::id());
      return view('Associacao.editar_associacao', [
        'associacao' => $associacao->associacao,
      ]);

    }

    public function verAssociacao(){
      $this->authorize('gerenciar', User::class);
      $associacao = User::find(Auth::id());
      return view('Associacao.info_associacao', [
        'associacao' => $associacao->associacao,
      ]);
    }

    public function alterarSenha(){
      $this->authorize('gerenciar', User::class);
      $associacao = User::find(Auth::id());
      return view('Associacao.alterar_senha', [
        'associacao' => $associacao->associacao,
      ]);
    }

    public function verRemover(){
      $this->authorize('gerenciar', User::class);
      $associacao = User::find(Auth::id());
      return view('Associacao.remover_ocs', [
        'ocs' => $associacao->associacao->ocs,
      ]);
    }

    public function removerOcs($id){
      $this->authorize('gerenciar', User::class);
      $ocs = Ocs::find($id);
      if ($ocs) {
        foreach ($ocs->produtor as $prod) {
          $us = $prod->user;
          if($us->endereco){
            $us->endereco->delete();
          }
          $us->produtor->delete();
          $us->delete();
        }
        foreach ($ocs->agendamentoReuniao as $reuniao) {
          $regis = $reuniao->reuniaoRegistrada;
          foreach ($regis->fotosReuniao as $ft) {
            $ft->delete();
          }
          foreach ($regis->retificacao as $rt) {
            $rt->delete();
          }
          if($regis->endereco){
            $regis->delete();
          }
          $reuniao->delete();
          $us->produtor->delete();
          $us->delete();
        }
        $ocs->delete();
        return redirect()->back()->with('Sucesso', 'OCS removida com sucesso!');
      }
      return redirect()->back();
    }

    public function salvarAlterarSenha(Request $request){
      $this->authorize('gerenciar', User::class);
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

      return redirect()->route('associacao.verAssociacao')->with('Sucesso', 'Edição finalizada com sucesso!');
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

        return redirect()->back()->with('Sucesso', 'OCS cadastrada com sucesso!');
    }

    public function salvarEditarOcs(Request $request){
        $this->authorize('gerenciar', User::class);
        $entrada = $request->all();
        $ocs = Ocs::find($entrada['id']);


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

        $ocs->fill($entrada);

        $ocs->save();

        return redirect()->back()->with('Sucesso', 'Operação realizada com sucesso!');
    }

    public function listarOcs(){
      $this->authorize('gerenciar', User::class);
      $user = User::find(Auth::id());
      return view('Associacao.listar_ocs', [
        'associacao' => $user->associacao,
      ]);
    }

    public function cadastrarOcs(){
      $user = User::find(Auth::id());
      return view('Associacao.criar_ocs', [
        'id' => $user->associacao->id,
      ]);
    }

    public function salvarCadastrarMembro(Request $request){
      $this->authorize('gerenciar', User::class);
      $entrada = $request->all();

      $messages = [
          'required' => 'O campo :attribute é obrigatório.',
          'password.required' => 'A senha é obrigatória.',
          'email.required' => 'O CPF é obrigatório',
          'email.min' => 'O CPF deve ter 14 numeros',
          'email.max' => 'O CPF deve ter 14 numeros',
          'email.unique' => 'O CPF já foi cadastrado',
          'email2.unique' => 'O email já existe',
          'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
          'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
          'unique' => 'O :attribute já existe',
      ];


      $validator_user = Validator::make($entrada, User::$regras_validacao_criar_produtor, $messages);
      if ($validator_user->fails()) {
          return redirect()->back()
                           ->withErrors($validator_user)
                           ->withInput();
      }

      $user = new User;
      $user->fill($entrada);
      $user->tipo_perfil = $entrada['tipo_perfil'];
      $user->password = Hash::make('123123123');
      $user->save();

      $produtor = new Produtor;
      $produtor->fill($entrada);
      $produtor->primeiro_acesso = true;
      $produtor->user_id = $user->id;

      $ocs = Ocs::find($entrada['ocs_id']);
      if($ocs->coordenador() && $entrada['tipo_perfil'] == 'Coordenador'){
        foreach ($ocs->produtor as $prod) {
          if($prod->user->tipo_perfil == 'Coordenador'){
            $prod->user->tipo_perfil = 'Produtor';
            $prod->user->save();
          }
        }
      }

      $produtor->ocs_id = $entrada['ocs_id'];

      $produtor->save();

      if(!$produtor->id){
        User::find($user->id)->delete();
      }



      return redirect()->back()->with('Sucesso', 'Cadastro realizado com sucesso!');

    }



}
