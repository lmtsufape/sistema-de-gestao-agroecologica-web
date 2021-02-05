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
use App\Models\Produtor;
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
      $this->authorize('gerenciar', User::class);
      $user = User::find($id);

      if($user->tipo_perfil == "Coordenador"){
          $user->tipo_perfil = "Produtor";
        } else if($user->tipo_perfil == "Produtor"){
          foreach ($user->produtor->ocs->produtor as $prod) {
            if($prod->user->tipo_perfil == "Coordenador"){
              $prod->user->tipo_perfil = "Produtor";
              $prod->user->save();
            }
          }
          $user->tipo_perfil = "Coordenador";
        } else {
          return redirect()->back();
        }
      $user->save();
      return redirect()->back()->with('Sucesso', 'Operação realizada com sucesso!');
    }

    public function cadastroProdutor() {
        $this->authorize('coordenar', User::class);
        return view('Coordenador.criar_produtor');
    }


    public function cadastroReuniao($id_reuniao){
        $this->authorize('coordenar', User::class);
        $reuniaoAgendada = AgendamentoReuniao::find($id_reuniao);
        return view('Coordenador.cadastro_reuniao')->with([
          'produtores' => $this->getProdutoresDaOcs(),
          'reuniao' => $reuniaoAgendada,
          'allProds' => json_encode($this->getProdutoresDaOcs()),
        ]);
    }

    public function criarReuniao(){
        $this->authorize('coordenar', User::class);
        return view('Coordenador.criar_reuniao');
    }

    public function cancelarReuniaoSimples(){
        $this->authorize('coordenar', User::class);
        $logado = User::find(Auth::id());
        return view('Coordenador.cancelar_reuniao')->with(['reunioes_agendadas' => $this->getReunioesAgendadasDaOcs(), 'usuario' => $logado]);
    }

    public function registarReuniaoSimples(){
        $this->authorize('coordenar', User::class);
        $logado = User::find(Auth::id());
        return view('Coordenador.registrar_reuniao')->with(['reunioes_agendadas' => $this->getReunioesAgendadasDaOcs(), 'usuario' => $logado]);
    }

    public function retificarReuniaoSimples(){
        $this->authorize('coordenar', User::class);
        $logado = User::find(Auth::id());
        return view('Coordenador.retificar_reuniao')->with(['reunioes_agendadas' => $this->getReunioesAgendadasDaOcs(), 'usuario' => $logado]);
    }

    public function verOcs(){
        $this->authorize('primeiroAcesso', User::class);
        return view('Produtor.ver_ocs', [
            'ocs' => Auth::user()->produtor->ocs,
        ]);

    }

    public function agendamentoReuniao(){
        $this->authorize('coordenar', User::class);
        return view('Coordenador.cadastro_agendamento_reuniao');
    }


    public function verReuniao($id_reuniao){
        $this->authorize('primeiroAcesso', User::class);
        $reuniaoAgendada = AgendamentoReuniao::find($id_reuniao);
        $userLogado = Auth::user()->produtor;

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
      $this->authorize('coordenar', User::class);
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
      $user->tipo_perfil = 'Produtor';
      $user->password = Hash::make('123123123');
      $user->save();

      $produtor = new Produtor;
      $produtor->fill($entrada);
      $produtor->primeiro_acesso = true;
      $produtor->user_id = $user->id;

      $produtor->ocs_id = Auth::user()->produtor->ocs_id;

      $produtor->save();

      if(!$produtor->id){
        User::find($user->id)->delete();
      }

      return redirect()->back()->with('Sucesso', 'Cadastro realizado com sucesso!');
    }

    public function salvarCadastrarReuniao(Request $request, $reuniao_agendada_id){
        $this->authorize('coordenar', User::class);
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
        $reuniao->agendamento_id = $reuniao_agendada_id;

        if($request->hasFile('ata')){
            $file = $request->allFiles()['ata'];
            $reuniao->ata = $file->store('public/fotosReuniao/ata' . $reuniao->ocs_id . '/' . $reuniao->id);
            echo $reuniao->ata;
        }

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
        $this->authorize('primeiroAcesso', User::class);
        $coordenadorLogado = Auth::user()->produtor;
        return $coordenadorLogado->ocs->agendamentoReuniao->reverse();
    }

    public function salvarCadastrarAgendamentoReuniao(Request $request){
        $this->authorize('coordenar', User::class);
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

        $coordenadorlogado = Auth::user()->produtor;

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
        $this->authorize('coordenar', User::class);
        $reuniaoAgendada = AgendamentoReuniao::find($reuniao_agendada_id);

        if($reuniaoAgendada->registrada == false){
            $reuniaoAgendada->delete();
        }

        return redirect(route('user.coordenador.listar_reunioes'));
    }

    public function editarReuniao($id_reuniao){
        $this->authorize('coordenar', User::class);
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
        $this->authorize('coordenar', User::class);
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
