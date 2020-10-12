<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Endereco;
use App\Models\Ocs;
use App\Models\Propriedade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PropriedadeController extends Controller {

    private $mensagens = [
        'required' => 'O campo :attribute é obrigatório.',
        'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
        'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
        'password.required' => 'A senha é obrigatória.',
    ];

    public function cadastrarPropriedade(){
        $propriedade = Propriedade::where('id_produtor', Auth::id())->get();
        if($propriedade){
            return view('Produtor/propriedade_ver', ['propriedade' => $propriedade]);
        } else {
            return view('Produtor\cadastro_propriedade');
        }
    }

    public function salvarCadastrarPropriedade(Request $request){
        $entrada = $request->all();
        $mensagens = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
        ];

        $validator_propriedade = Validator::make($entrada, Propriedade::$regras_validacao_criar, $mensagens);
        if ($validator_propriedade->fails()) {
            return redirect()->back()
                             ->withErrors($validator_propriedade)
                             ->withInput();
        }

        $propriedade = new Propriedade;
        $propriedade->fill($entrada);
        $propriedade->id_produtor = Auth::id();
        $propriedade->save();

        return view('Produtor/propriedade_ver', ['propriedade' => $propriedade]);
    }

    public function verPropriedade(){
        $propriedade = Propriedade::where('id_produtor', Auth::id())->get();
        if(count($propriedade) > 0){
            return view('Produtor/propriedade_ver', ['propriedade' => $propriedade[0]]);
        } else {
            return view('Produtor\cadastro_propriedade');
        }
    }


}
