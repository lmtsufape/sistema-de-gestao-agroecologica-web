<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Endereco;
use App\Models\CanteiroDeProducao;
use App\Models\Producao;
use App\Models\FotosReuniao;
use App\Models\Ocs;
use App\Models\AgendamentoReuniao;
use App\Models\Reuniao;
use App\Models\Retificacao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CoordenadorController extends Controller {


    private $messages = [
        'required' => 'O campo :attribute é obrigatório.',
        'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
        'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        'password.required' => 'A senha é obrigatória.',
    ];

    public function mudaPerfil($id){
      $user = User::find($id);
      if($user->tipo_perfil == "Coordenador"){
          $user->tipo_perfil = "Produtor";
        } else if($user->tipo_perfil == "Produtor"){
          $user->tipo_perfil = "Coordenador";
        } else {
          return redirect()->back();
        }
      $user->save();
      return redirect()->back()->with('Sucesso', 'Operação realizada com sucesso!');
    }

    public function cadastroProdutor() {
        $logado = User::find(Auth::id());
        if ($logado->tipo_perfil == "Coordenador") {
            return view('Coordenador.criar_produtor');
        }
        return redirect()->back();
    }

    public function cadastroCoordenador() {
        return view('Coordenador.cadastro_coordenador');
    }

    public function cadastroOcs() {
        return view('Coordenador.cadastro_ocs');
    }

    public function cadastroReuniao($id_reuniao){
        $logado = User::find(Auth::id());
        $reuniaoAgendada = AgendamentoReuniao::find($id_reuniao);
        if($logado->tipo_perfil == "Coordenador"){
            return view('Coordenador.cadastro_reuniao')->with([
              'produtores' => $this->getProdutoresDaOcs(),
              'reuniao' => $reuniaoAgendada,
              'allProds' => json_encode($this->getProdutoresDaOcs()),
            ]);
        }
        return redirect()->back();
    }

    public function verOcs(){
        $userLogado = User::find(Auth::id());
        if ($userLogado->tipo_perfil == "Associacao") {
          return redirect()->back();
        }
        return view('Produtor.ver_ocs', [
            'ocs' => $userLogado->produtor->ocs,
        ]);

    }

    public function agendamentoReuniao(){
        $logado = User::find(Auth::id());
        if($logado->tipo_perfil == "Coordenador"){
            return view('Coordenador.cadastro_agendamento_reuniao');
        }
        return redirect()->back();
    }

    public function editarOcs(){
        $coordenadorlogado = User::find(Auth::id());
        if ($coordenadorlogado->tipo_perfil == "Coordenador") {
            return view('Coordenador.editar_ocs', [
                'ocs' => $coordenadorlogado->ocs,
            ]);
        }
        return redirect()->back();
    }

    public function salvarEditarOcs(Request $request){
        $entrada = $request->all();
        $coordenadorlogado = User::find(Auth::id());
        $ocs =  $coordenadorlogado->ocs;

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

        $validator_ocs = Validator::make($entrada, Ocs::$regras_validacao_editar, $messages);
        if ($validator_ocs->fails()) {
            return redirect()->back()
                             ->withErrors($validator_ocs)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $ocs->fill($entrada);
        $ocs->endereco_id = $endereco->id;
        $ocs->unidade_federacao = $endereco->estado;

        $ocs->save();

        return redirect()->route('user.coordenador.ver_ocs');
    }


    public function verReuniao($id_reuniao){
        $reuniaoAgendada = AgendamentoReuniao::find($id_reuniao);
        $userLogado = User::find(Auth::id());

        if($reuniaoAgendada){
            return view('Coordenador.ver_reuniao', ['reuniao' => $reuniaoAgendada, 'usuario' => $userLogado]);
        }else{
            return redirect()->route('erro', ['msg_erro' => "Reunião inexistente"]);
        }
    }

    public function listarReunioes(){
        $logado = User::find(Auth::id());
        return view('Coordenador.listar_reunioes')->with(['reunioes_agendadas' => $this->getReunioesAgendadasDaOcs(), 'usuario' => $logado]);
    }

    public function salvarCadastrarProdutor(Request $request) {
        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
        ];


        $validator_produtor = Validator::make($entrada, User::$regras_validacao_criar_produtor, $messages);
        if ($validator_produtor->fails()) {
            return redirect()->back()
                             ->withErrors($validator_produtor)
                             ->withInput();
        }


        $produtor = new User;
        $produtor->fill($entrada);
        $produtor->tipo_perfil = 'Produtor';
        $produtor->primeiro_acesso = true;
        $produtor->password = Hash::make('123123123');

        $coordenadorlogado = User::find(Auth::id());
        $produtor->ocs_id = $coordenadorlogado->ocs_id;

        $produtor->save();

        //Todo: Tem que tirar o comment e ajustar a tela de view do produtor...
        return redirect(route('user.coordenador.listar_produtores'));
    }

    public function salvarCadastrarReuniao(Request $request, $reuniao_agendada_id){
        $entrada = $request->all();

        $messages = [
            'participantes.*' => 'O campo Participantes é obrigatório',
            'ata.*' => 'O campo Ata é obrigatório',
        ];

        $validator_reuniao = Validator::make($entrada, \App\Models\Reuniao::$rules, $messages);

        if(!$validator_reuniao->errors()->isEmpty()){
            return redirect()->back()->withErrors($validator_reuniao)->withInput();
        }

        $participantes = $entrada['participantes'];


        $reuniao = new Reuniao();
        $reuniao->participantes = $participantes;
        $reuniao->ata = $entrada['ata'];
        $reuniao->agendamento_id = $reuniao_agendada_id;
        $reuniao->save();

        $reuniaoAgendada = AgendamentoReuniao::find($reuniao_agendada_id);
        $reuniaoAgendada->registrada = true;
        $reuniaoAgendada->save();

        //Persistindo as fotos

        $request->validate([
            'fotos'	=> 'required', //'required|image|mimes:jpg,jpeg,png'
        ]);

        if($request->hasFile('fotos')){
            for($i = 0; $i < count($request->allFiles()['fotos']); $i++){
                $file = $request->allFiles()['fotos'][$i];

                $fotosReuniao = new FotosReuniao();
                $fotosReuniao->reuniao_id = $reuniao->id;
                $fotosReuniao->path = $file->store('public/fotosReuniao/' . $reuniao->ocs_id . '/' . $reuniao->id);

                echo $fotosReuniao->path;
                $fotosReuniao->save();

                unset($fotosReuniao);
            }
        }

        return redirect(route('user.coordenador.listar_reunioes'));
    }

    public function getProdutoresDaOcs(){
        $produtores = User::where('tipo_perfil', '=', 'Produtor')->get();
        $produtoresDaOcs = array();

        $coordenadorLogado = User::find(Auth::id());
        $ocs_id = $coordenadorLogado->ocs_id;

        foreach ($produtores as $produtor) {
            if($produtor->ocs_id == $ocs_id){
                array_push($produtoresDaOcs, $produtor);
            }
        }

        return $produtoresDaOcs;
    }

    public function getReunioesAgendadasDaOcs(){
        $coordenadorLogado = User::find(Auth::id());
        return $coordenadorLogado->ocs->agendamentoReuniao->reverse();
    }

    public function salvarCadastrarAgendamentoReuniao(Request $request){
        $entrada = $request->all();

        $time = strtotime($entrada['data']);
        $entrada['data'] = date('Y-m-d', $time);

        $messages = [
            'nome.*' => 'O campo Nome é obrigatório deve conter no mínimo 5 caracteres.',
            'data.required' => 'O campo Data é obrigatório',
            'local.required' => 'O campo Local é obrigatório',
        ];

        $validator_reuniao = Validator::make($entrada, \App\Models\AgendamentoReuniao::$rules, $messages);

        if(!$validator_reuniao->errors()->isEmpty()){
            return redirect()->back()->withErrors($validator_reuniao)->withInput();
        }

        $coordenadorlogado = User::find(Auth::id());

        $agendamentoReuniao = new AgendamentoReuniao();
        $agendamentoReuniao->nome = $entrada['nome'];
        $agendamentoReuniao->data = $entrada['data'];
        $agendamentoReuniao->local = $entrada['local'];
        $agendamentoReuniao->registrada = false;

        $agendamentoReuniao->ocs_id = $coordenadorlogado->ocs_id;
        $agendamentoReuniao->save();

        return redirect(route('user.coordenador.listar_reunioes'));

    }

    public function cancelarReuniaoAgendada($reuniao_agendada_id){
        $reuniaoAgendada = AgendamentoReuniao::find($reuniao_agendada_id);

        if($reuniaoAgendada->registrada == false){
            $reuniaoAgendada->delete();
        }

        return redirect(route('user.coordenador.listar_reunioes'));
    }

    public function editarReuniao($id_reuniao){
        $reuniao = AgendamentoReuniao::find($id_reuniao);
        if ($reuniao) {
            return view('Coordenador.editar_reuniao', [
                'reuniao' => $reuniao,
            ]);
        } else {
            return redirect(route('user.coordenador.listar_reunioes'));
        }
    }

    public function salvarEditarReuniao(Request $request){
        $entrada = $request->all();

        $data = date('Y-m-d');

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
        ];

        $validator_retificacao = Validator::make($entrada, Retificacao::$regras_validacao, $messages);
        if ($validator_retificacao->fails()) {
            return redirect()->back()
                             ->withErrors($validator_retificacao)
                             ->withInput();
        }


        $retificacao = new Retificacao;
        $retificacao->fill($entrada);
        $retificacao->data = $data;
        $retificacao->reuniao_id = $entrada['id_reuniao'];
        $retificacao->save();

        return redirect(route('user.coordenador.listar_reunioes'));
    }
}
