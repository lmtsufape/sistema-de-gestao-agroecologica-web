<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Endereco;
use App\Models\Ocs;
use App\Models\Propriedade;
use App\Models\Producao;
use App\Models\Produto;
use App\Models\Manejo;
use App\Models\CanteiroDeProducao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PropriedadeController extends Controller {

    private $mensagens = [
        'required' => 'O campo :attribute é obrigatório.',
        'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
        'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        'password.required' => 'A senha é obrigatória.',
    ];

    public function editarPropriedade(){
      $this->authorize('coordenadorProdutor', User::class);
      $produtor =  Auth::user()->produtor;
      if($produtor->propriedade){
        return view('Produtor/editar_propriedade', [
            'propriedade' => $produtor->propriedade,
        ]);
      }
     return redirect()->route('user.cadastrarPropriedade');
    }
    public function cadastrarProducao($id_canteiro){
        $this->authorize('coordenadorProdutor', User::class);
        $produtos = Produto::all();
        $canteiroexiste = CanteiroDeProducao::find($id_canteiro);
        if ($canteiroexiste) {
            return view('Produtor/cadastro_producao', [
                'canteiro' => $id_canteiro,
                'produtos' => $produtos,
            ]);
        }
        return redirect()->route('user.canteiroProducao.listar');

    }

    public function salvarCadastrarProducao(Request $request){
        $this->authorize('coordenadorProdutor', User::class);
        $entrada = $request->all();
        $ids_prods = "";

        foreach ($entrada['idsman'] as $id) {
            $ids_prods .= $id . ",";
        }

        $producao = new Producao;
        $producao->lista_produtos = $ids_prods;
        $producao->canteirodeproducao_id = $entrada['id_canteirodeproducao'];
        $producao->fill($entrada);
        $producao->save();

        return redirect()->route('user.canteiroProducao.producao.ver', $producao->id);

    }

    public function removerProducao($id_producao){
        $this->authorize('coordenadorProdutor', User::class);
        $producao = Producao::find($id_producao);
        if($producao){
            $producao->delete();
        }
        return redirect()->back();

    }

    public function editarProducao($id_producao){
        $this->authorize('coordenadorProdutor', User::class);
        $producao = Producao::find($id_producao);
        if($producao){
            $produtor = $producao->canteirodeproducaos->propriedade->produtor;
            if(Auth::id() == $produtor->id){
                $produtos = Produto::all();
                return view('Produtor/editar_producao', [
                    'producao' => $producao,
                    'produtos' => $produtos,
                ]);
            } else {
                return redirect()->back()->withErrors();
            }
        }
        return redirect()->back();
    }

    public function salvarEditarProducao(Request $request){
        $this->authorize('coordenadorProdutor', User::class);
        $entrada = $request->all();

        $producao = Producao::find($entrada['id_producao']);

        $ids_prods = "";
        foreach ($entrada['idsman'] as $id) {
            $ids_prods .= $id . ",";
        }

        $producao = new Producao;
        $producao->lista_produtos = $ids_prods;
        $producao->canteirodeproducao_id = $entrada['canteirodeproducao_id'];
        $producao->fill($entrada);
        $producao->save();

        return redirect()->route('user.canteiroProducao.producao.ver', $producao->id);

    }

    public function cadastrarManejo(){
        return view('Produtor/cadastro_manejo');
    }

    public function salvarCadastrarManejo(Request $request){
        $entrada = $request->all();
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        ];

        $validator_manejo = Validator::make($entrada, Manejo::$regras_validacao_criar, $mensagens);
        if ($validator_manejo->fails()) {
            return redirect()->back()
                             ->withErrors($validator_manejo)
                             ->withInput();
        }

        $manejo = new Manejo;
        $manejo->fill($entrada);
        $manejo->save();

        return view('home');
    }

    public function cadastrarPropriedade(){
        $this->authorize('coordenadorProdutor', User::class);
        $produtor = Auth::user()->produtor;
        if($produtor->propriedade){
            return view('Produtor/propriedade_ver', [
                'propriedade' => $produtor->propriedade,
            ]);
        } else {
            return view('Produtor.cadastro_propriedade');
        }
    }

    public function salvarEditarPropriedade(Request $request){
        $this->authorize('coordenadorProdutor', User::class);
        $entrada = $request->all();
        $produtor = Auth::user()->produtor;
        $propriedade =  $produtor->propriedade;

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        ];

        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $mensagens);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_propriedade = Validator::make($entrada, Propriedade::$regras_validacao_criar, $mensagens);
        if ($validator_propriedade->fails()) {
            return redirect()->back()
                             ->withErrors($validator_propriedade)
                             ->withInput();
        }

        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $propriedade->fill($entrada);
        $propriedade->endereco_id = $endereco->id;
        $propriedade->user_id = $produtor->id;
        $propriedade->save();

        return redirect()->route('user.verPropriedade');

    }

    public function salvarCadastrarCanteiroDeProducao(Request $request){
        $this->authorize('coordenadorProdutor', User::class);
        $entrada = $request->all();
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        ];

        $validator_canteiro = Validator::make($entrada, CanteiroDeProducao::$regras_validacao_criar, $mensagens);
        if ($validator_canteiro->fails()) {
            return redirect()->back()
                             ->withErrors($validator_canteiro)
                             ->withInput();
        }

        $canteiro = new CanteiroDeProducao;
        $canteiro->fill($entrada);
        $canteiro->propriedade_id = Auth::user()->produtor->propriedade->id;
        $canteiro->save();

        return redirect()->route('user.canteiroProducao.listar');

    }

    public function verProducao($id_producao){
        $this->authorize('coordenadorProdutor', User::class);
        $producao = Producao::find($id_producao);
        if($producao){
            $user_id = $producao->canteirodeproducaos->propriedade->produtor->id;
            return view('Produtor.ver_producao',[
                'producao' => $producao,
                'id_p' => $user_id,
            ]);
        } else {
            return redirect()->route('home');
        }
    }


    public function listarCanteiroDeProducao(){
        $this->authorize('coordenadorProdutor', User::class);
        $produtor = Auth::user()->produtor;
        if($produtor->propriedade){
            return view('Produtor/listar_canteiros', [
                'canteiro' => $produtor->propriedade->canteirodeproducaos,
                'propriedade' => $produtor->propriedade->id,
            ]);
        } else {
            return redirect()->route('user.cadastrarPropriedade');
        }
    }



    public function salvarCadastrarPropriedade(Request $request){
        $this->authorize('coordenadorProdutor', User::class);
        $entrada = $request->all();
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        ];

        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $mensagens);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_propriedade = Validator::make($entrada, Propriedade::$regras_validacao_criar, $mensagens);
        if ($validator_propriedade->fails()) {
            return redirect()->back()
                             ->withErrors($validator_propriedade)
                             ->withInput();
        }

        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();


        $propriedade = new Propriedade;
        $propriedade->fill($entrada);
        $propriedade->endereco_id = $endereco->id;
        $propriedade->user_id = Auth::user()->produtor->id;
        $propriedade->save();

        return redirect()->route('user.verPropriedade');
    }

    public function verPropriedade(){
        $this->authorize('coordenadorProdutor', User::class);
        $propriedade = Auth::user()->produtor->propriedade;
        if($propriedade){
            $canteiros = $propriedade->canteirodeproducaos;
            return view('Produtor/propriedade_ver', [
                'propriedade' => $propriedade,
                'canteiros' => $canteiros,
            ]);
        } else {
            return view('Produtor.cadastro_propriedade');
        }
    }

    public function cadastrarProduto(){
        $manejo = Manejo::all();
        return view('Produtor/cadastro_produto', ['manejo' => $manejo]);
    }

    public function salvarCadastrarProduto(Request $request){
        $entrada = $request->all();
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        ];

        $manejs = "";

        foreach ($entrada['idsman'] as $id) {
            $manejs .= $id . ",";
        }



        $produto = new Produto;
        $produto->ids_manejos = $manejs;
        $produto->fill($entrada);
        $produto->save();

        return view('home');
    }





}
