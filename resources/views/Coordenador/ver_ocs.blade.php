@extends('layouts.app')
<script>

function toggleFormElements() {
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }

    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].type === "text"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "date"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "number"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "tel"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "email"){
            inputs[i].disabled = false;
        }
    }
    var selects = document.getElementsByTagName("select");
    for (var i = 0; i < selects.length; i++) {
        selects[i].disabled = false;
    }
    var textareas = document.getElementsByTagName("textarea");
    for (var i = 0; i < textareas.length; i++) {
        textareas[i].disabled = false;
    }
    var buttons = document.getElementsByTagName("button");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = false;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("enable-bt").addEventListener('click', toggleFormElements, false);
});


</script>

@section('content')

<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-10">
                    <h1 class="marker">Ocs</h1>
                </div>
                <div class="col-md-2">
                    <button class="btn edit-bt" id="enable-bt">Editar</button>
                </div>
            </div>

            <div class="formulario">
                <hr class="divider"></hr>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="padding: 0px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="formulario" method="post" action="{{ route('user.coordenador.editarOcs.salvar') }}">
                    @csrf
                    <div class="form-row inner-div">
                        <label class="">Informações da OCS</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label-static required">Nome da OCS</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="nome_ocs" name="nome_ocs" value="{{ old('nome_ocs', $ocs->nome_ocs) }}">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label-static">Coordenador responsável</label><br>
                            <label class="label-ntstatic"><b>{{$ocs->nome_para_contato}}</b></label>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <label class="label-static required">Órgão fiscalizador</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="orgao_fiscalizador" name="orgao_fiscalizador" placeholder="" value="{{ old('orgao_fiscalizador', $ocs->orgao_fiscalizador) }}">
                        </div>

                        <div class="col-md-5 repos">
                            <br>
                            <label class="label-static">Produtores</label>
                                <table class="table">
                                    <tbody class="wrp">
                                        @foreach($ocs->produtor as $pro)
                                        <tr>
                                            <td class="cor-texto basic-space">{{$pro->nome}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                        </div>
                    </div>
                    <div class="form-row inner-div">
                        <label class="">Informações da associação</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="label-static required">Nome da entidade</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="nome_entidade" name="nome_entidade" placeholder="Nome Completo" value="{{ old('nome_entidade', $ocs->nome_entidade) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="label-static required">CNPJ da associação</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="cnpj" name="cnpj" placeholder="CNPJ" value="{{ old('cnpj', $ocs->cnpj) }}">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="label-static required">Telefone</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="telefone" name="telefone" placeholder="Telefone da OCS" value="{{ old('telefone', $ocs->telefone) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="label-static required">Email</label>
                            <input disabled="true" class="form-control input-stl" type="email" class="form-control" id="emailemail" name="email" placeholder="Email" value="{{ old('email', $ocs->email) }}" >
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static">Celular</label>
                            <input disabled="true" class="form-control input-stl" type="number" class="form-control" name="celular" placeholder="Celular" value="{{ old('telefone', $ocs->celular) }}">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static">Fax</label>
                            <input disabled="true" class="form-control input-stl" type="number" class="form-control" name="fax" placeholder="FAX" value="{{ old('telefone', $ocs->fax) }}">
                        </div>
                    </div>
                    <br>
                    <div class="form-row inner-div">
                        <label class="">Endereço da associação</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="label-static">Logradouro</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="nome_rua" name="nome_rua" placeholder="Rua onde se localiza a OCS" value="{{ old('nome_rua', $ocs->endereco->nome_rua) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="label-static">Bairro</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="bairro" name="bairro" placeholder="Bairro onde se localiza a OCS" value="{{ old('bairro', $ocs->endereco->bairro) }}">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="label-static">Nº</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="numero_casa" name="numero_casa" value="{{ old('numero_casa', $ocs->endereco->numero_casa) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="label-static required">Cidade</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="cidade" name="cidade" value="{{ old('cidade',$ocs->endereco->cidade) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="label-static required">Estado</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="estado" name="estado" value="{{ old('estado', $ocs->endereco->estado) }}">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="label-static">CEP</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="cep" name="cep" value="{{ old('cep', $ocs->endereco->cep) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label-static">Descrição</label>
                            <textarea disabled="true"type="text" class="form-control input-stl" id="descricao" name="descricao" placeholder="Descrição de como chegar a OCS">{{ $ocs->endereco->descricao}}</textarea>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <label class="label-static">Ponto de Referência</label>
                            <textarea disabled="true"type="text" class="form-control input-stl" id="ponto_referencia" name="ponto_referencia">{{ $ocs->endereco->ponto_referencia}}</textarea>
                            <br>
                        </div>
                    </div>
                    <hr class="outliner"></hr>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label style="color: red" class="label-static required">Campos obrigatórios</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button disabled="true" class="btn botao-submit" type="submit">Finalizar Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
