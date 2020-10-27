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

class CoordenadorController extends Controller {

    private $messages = [
        'required' => 'O campo :attribute é obrigatório.',
        'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
        'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        'password.required' => 'A senha é obrigatória.',
    ];

    public function coordenadorHome() {
        return view('Coordenador\home');
    }

    public function cadastroProdutor() {
        return view('Coordenador\criar_produtor');
    }

    public function cadastroCoordenador() {
        return view('Coordenador\cadastro_coordenador');
    }

    public function cadastroOcs() {
        return view('Coordenador\cadastro_ocs');
    }

    public function verOcs(){
        $coordenadorlogado = User::find(Auth::id());
        return view('Coordenador\ver_ocs', [
            'ocs' => $coordenadorlogado->ocs,
        ]);
    }


    //Todo, isso aqui tem que ser todo revisto...
    public function verProdutor($id) {
        $produtor = User::find($id);
        if($produtor){
            return view('Coordenador/ver_produtor', ['produtor' => $produtor]);
        } else {
            return redirect()->route('erro', ['msg_erro' => "Produtor inexistente"]);
        }
    }


    public function salvarCadastrarProdutor(Request $request) {
        $entrada = $request->all();

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

        $validator_produtor = Validator::make($entrada, User::$regras_validacao_criar, $messages);
        if ($validator_produtor->fails()) {
            return redirect()->back()
                             ->withErrors($validator_produtor)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();


        $produtor = new User;
        $produtor->fill($entrada);
        $produtor->tipo_perfil = 'Produtor';
        $produtor->id_endereco = $endereco->id;

        $produtor->password = Hash::make($entrada['password']);
        $produtor->save();

        //Todo: Tem que tirar o comment e ajustar a tela de view do produtor...
        redirect()->route('user/coordenador/ver_produtor/{id}', $produtor->id);
    }


    public function salvarCadastrarCoordenador(Request $request) {
        $entrada = $request->all();
        $ocs = $request->session()->get('ocs');


        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'unique' => 'O :attribute já existe',
        ];

        $time = strtotime($entrada['data_nascimento']);
        $entrada['data_nascimento'] = date('Y-m-d',$time);

        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_coordenador = Validator::make($entrada, User::$regras_validacao_criar, $messages);
        if ($validator_coordenador->fails()) {
            return redirect()->back()
                             ->withErrors($validator_coordenador)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();


        $coordenador = new User;
        $coordenador->fill($entrada);
        $coordenador->tipo_perfil = 'Coordenador';
        $coordenador->id_endereco = $endereco->id;


        $coordenador->password = Hash::make($entrada['password']);
        $ocs->nome_para_contato = $coordenador->nome;
        $ocs_aux = Ocs::select('cnpj')->get();
        $cad = false;
        foreach ($ocs_aux as $oc) {
            if(str_contains($oc->cnpj, $ocs->cnpj)) {
                $cad = true;
            }
        }

        if(!$cad){
            $ocs->save();
        }
        $coordenador->id_ocs = $ocs->id;
        $coordenador->save();
        $request->session()->forget('ocs');


        //Todo: Tem que tirar o comment e ajustar a tela de view do produtor...
        //return redirect()->route('Coordenador/home');
    }

    public function salvarCadastrarOcs(Request $request) {
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

        $validator_ocs = Validator::make($entrada, Ocs::$regras_validacao_criar, $messages);
        if ($validator_ocs->fails()) {
            return redirect()->back()
                             ->withErrors($validator_ocs)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $ocs = new Ocs;
        $ocs->fill($entrada);
        $ocs->id_endereco = $endereco->id;
        $ocs->unidade_federacao = $endereco->estado;
        $request->session()->put('ocs', $ocs);

        return view('Coordenador\cadastro_coordenador');
    }

}
