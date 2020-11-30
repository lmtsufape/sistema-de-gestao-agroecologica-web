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

    public function cadastrarProducao($id_canteiro){
        $produtos = Produto::all();
        $canteiroexiste = CanteiroDeProducao::find($id_canteiro);
        if ($canteiroexiste) {
            return view('Produtor/cadastro_producao', [
                'canteiro' => $id_canteiro,
                'produtos' => $produtos,
            ]);
        }
        return redirect()->route('user.canteiroProducao.cadastrar');

    }

    public function salvarCadastrarProducao(Request $request){
        $entrada = $request->all();
        $ids_prods = "";

        foreach ($entrada['idsman'] as $id) {
            $ids_prods .= $id . ",";
        }

        $producao = new Producao;
        $producao->lista_produtos = $ids_prods;
        $producao->id_canteirodeproducao = $entrada['id_canteirodeproducao'];
        $producao->fill($entrada);
        $producao->save();

        return redirect()->route('user.canteiroProducao.ver', $producao->id_canteirodeproducao);

    }

    public function removerProducao($id_producao){
        $producao = Producao::find($id_producao);
        if($producao){
            $producao->delete();
        }
        return redirect()->back();

    }

    public function editarProducao($id_producao){
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
        $entrada = $request->all();

        $producao = Producao::find($entrada['id_producao']);

        $ids_prods = "";
        foreach ($entrada['idsman'] as $id) {
            $ids_prods .= $id . ",";
        }

        $producao = new Producao;
        $producao->lista_produtos = $ids_prods;
        $producao->id_canteirodeproducao = $entrada['id_canteirodeproducao'];
        $producao->fill($entrada);
        $producao->save();

        return redirect()->route('user.canteiroProducao.ver', $producao->id_canteirodeproducao);

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
        $propriedade = Propriedade::where('id_produtor', Auth::id())->get();
        if($propriedade){
            $canteiros = CanteiroDeProducao::where('id_propriedade', $propriedade[0]->id)->get();
            return view('Produtor/propriedade_ver', [
                'propriedade' => $propriedade[0],
                'canteiros' => $canteiros,
            ]);
        } else {
            return view('Produtor.cadastro_propriedade');
        }
    }

    public function editarPropriedade(){
        $produtor = User::find(Auth::id());
        return view('Produtor.editar_propriedade', [
            'propriedade' => $produtor->propriedade,
        ]);

    }

    public function salvarEditarPropriedade(Request $request){
        $entrada = $request->all();
        $produtor = User::find(Auth::id());
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
        $propriedade->id_endereco = $endereco->id;
        $propriedade->id_produtor = Auth::id();
        $propriedade->save();

        return redirect()->route('user.verPropriedade');

    }

    public function cadastrarCanteiroDeProducao(){
        $propriedade = Propriedade::where('id_produtor', Auth::id())->get();
        if($propriedade){
            return view('Produtor/cadastro_canteiroDeProducao', ['propriedade' => $propriedade[0]->id]);
        } else {
            return view('Produtor.cadastro_propriedade');
        }
    }

    public function salvarCadastrarCanteiroDeProducao(Request $request){
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
        $canteiro->id_propriedade = $entrada['id_propriedade'];
        $canteiro->save();

        return redirect()->route('user.canteiroProducao.ver', $canteiro->id);

    }

    public function verCanteiroDeProducao($id_canteiro){
        $canteiro = CanteiroDeProducao::find($id_canteiro);
        $producao = Producao::where('id_canteirodeproducao', $id_canteiro)->get();
        if($canteiro){
            return view('Produtor/ver_canteiroDeProducao', [
                'canteiro' => $canteiro,
                'producao' => $producao,
            ]);
        } else {
            return view('Produtor.cadastro_canteiroDeProducao');
        }
    }



    public function salvarCadastrarPropriedade(Request $request){
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
        $propriedade->id_endereco = $endereco->id;
        $propriedade->id_produtor = Auth::id();
        $propriedade->save();

        return redirect()->route('user.verPropriedade');
    }

    public function verPropriedade(){
        $propriedade = Propriedade::where('id_produtor', Auth::id())->get();
        if(count($propriedade) > 0){
            $canteiros = CanteiroDeProducao::where('id_propriedade', $propriedade[0]->id)->get();
            return view('Produtor/propriedade_ver', [
                'propriedade' => $propriedade[0],
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
