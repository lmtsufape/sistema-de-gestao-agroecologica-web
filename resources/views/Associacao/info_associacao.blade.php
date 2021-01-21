@extends('layouts.app2')
@section('content')

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

<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-10">
                    <h1 class="marker">Informações da Associação</h1>
                </div>
                <div class="col-md-2">
                  <button class="btn edit-bt" id="enable-bt">Editar</button>
                </div>
            </div>
            <div class="row esp">
                <div class="col-md-12">
                    <hr class="divider"></hr>
                </div>
            </div>
            <br>
            <form class="formulario" method="post" action="{{ route('associacao.editarAssociacao.salvar') }}">
            @csrf
            <div class="form-row inner-div">
                <label class="">Informações da Associação</label>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="label-static required">Nome da Associação</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="nome_entidade" name="nome" placeholder="Nome Completo" value="{{ old('nome', $associacao->user->nome) }}">
                </div>
                <div class="col-md-4">
                    <label class="label-static required">CNPJ da associação</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="cnpj" name="cnpj" placeholder="CNPJ" value="{{ old('cnpj', $associacao->cnpj) }}">
                    <br>
                </div>
                <div class="col-md-4">
                    <label class="label-static required">Telefone</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="telefone" name="telefone" placeholder="Telefone da OCS" value="{{ old('telefone', $associacao->user->telefone) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="label-static required">Email</label>
                    <input disabled="true" class="form-control input-stl" type="email" class="form-control" id="emailemail" name="email" placeholder="Email" value="{{ old('email', $associacao->user->email) }}" >
                </div>
                <div class="col-md-4 mb-4">
                    <label class="label-static">Celular</label>
                    <input disabled="true" class="form-control input-stl" type="number" class="form-control" name="celular" placeholder="Celular" value="{{ old('telefone', $associacao->celular) }}">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="label-static">Fax</label>
                    <input disabled="true" class="form-control input-stl" type="number" class="form-control" name="fax" placeholder="FAX" value="{{ old('telefone', $associacao->fax) }}">
                </div>
            </div>
            <br>
            <div class="form-row inner-div">
                <label class="">Endereço da associação</label>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="label-static">Logradouro</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="nome_rua" name="nome_rua" placeholder="Rua onde se localiza a OCS" value="{{ old('nome_rua', $associacao->user->endereco->nome_rua) }}">
                </div>
                <div class="col-md-4">
                    <label class="label-static">Bairro</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="bairro" name="bairro" placeholder="Bairro onde se localiza a OCS" value="{{ old('bairro', $associacao->user->endereco->bairro) }}">
                    <br>
                </div>
                <div class="col-md-4">
                    <label class="label-static">Nº</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="numero_casa" name="numero_casa" value="{{ old('numero_casa', $associacao->user->endereco->numero_casa) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="label-static required">Cidade</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="cidade" name="cidade" value="{{ old('cidade',$associacao->user->endereco->cidade) }}">
                </div>
                <div class="col-md-4">
                    <label class="label-static required">Estado</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="estado" name="estado" value="{{ old('estado', $associacao->user->endereco->estado) }}">
                    <br>
                </div>
                <div class="col-md-4">
                    <label class="label-static">CEP</label>
                    <input disabled="true"type="text" class="form-control input-stl" id="cep" name="cep" value="{{ old('cep', $associacao->user->endereco->cep) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="label-static">Descrição</label>
                    <textarea disabled="true"type="text" class="form-control input-stl" id="descricao" name="descricao" placeholder="Descrição de como chegar a OCS">{{ $associacao->user->endereco->descricao}}</textarea>
                    <br>
                </div>
                <div class="col-md-12">
                    <label class="label-static">Ponto de Referência</label>
                    <textarea disabled="true"type="text" class="form-control input-stl" id="ponto_referencia" name="ponto_referencia">{{ $associacao->user->endereco->ponto_referencia}}</textarea>
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

@endsection
