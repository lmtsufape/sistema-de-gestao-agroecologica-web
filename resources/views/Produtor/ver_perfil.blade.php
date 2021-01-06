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
                    <h1 class="marker">Minhas informações</h1>
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="padding: 0px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="formulario" method="post" action="{{ route('user.salvar_editar_perfil') }}">
                    @csrf
                    <div class="form-row inner-div">
                        <label class="">Informações básicas</label>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static required" for="nome">Nome Completo</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Nome Completo" value="{{ old('nome', $produtor->nome) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-static required" for="Email">Email</label>
                            <input disabled="true"type="email" class="form-control input-stl" id="email" name="email" placeholder="Email" value="{{ old('email', $produtor->email) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label class="label-static required" for="data de nascimento">Data de Nascimento</label>
                            <input disabled="true"type="date" class="form-control input-stl" name="data_nascimento" value="{{ old('data_nascimento', $produtor->data_nascimento) }}">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static required">RG</label>
                            <input disabled="true"type="number" class="form-control input-stl" name="rg" placeholder="RG" value="{{ old('rg', $produtor->rg) }}">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static required">CPF</label>
                            <input disabled="true"type="number" class="form-control input-stl" name="cpf" placeholder="CPF" value="{{ old('cpf', $produtor->cpf) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-7 mb-3">
                            <label class="label-static">Nome do Conjuge</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="nome_conjuge" name="nome_conjugue" placeholder="Nome do Conjuge" value="{{ old('nome_conjuge', $produtor->nome_conjuge) }}">
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="label-static required">Telefone</label>
                            <input disabled="true"type="tel" class="form-control input-stl" id="telefone" name="telefone" placeholder="Telefone" value="{{ old('telefone', $produtor->telefone) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Nome dos Filhos</label>
                        <textarea disabled="true"class="form-control input-stl" id="nome-filhos" name="nome_filhos" placeholder="Nome dos Filhos" rows="2"> {{$produtor->nome_filhos}} </textarea>
                    </div>
                    <div class="form-row inner-div">
                        <label class="">Endereço</label>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-4">
                            <label class="label-static">Rua</label>
                            <input disabled="true"type="text" class="form-control input-stl" name="nome_rua" placeholder="Rua" value="{{ old('nome_rua', $produtor->endereco->nome_rua) }}">
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="label-static">Numero</label>
                            <input disabled="true"type="number" class="form-control input-stl" name="numero_casa" placeholder="Numero" value="{{ old('numero_casa', $produtor->endereco->numero_casa) }}">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static">Bairro</label>
                            <input disabled="true"type="text" class="form-control input-stl" name="bairro" placeholder="Bairro" value="{{ old('bairro', $produtor->endereco->bairro) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Cidade</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="cidade" name="cidade" placeholder="Cidade" value="{{ old('cidade', $produtor->endereco->cidade) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static required">Estado</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="estado" name="estado" placeholder="Estado" value="{{ old('cidade', $produtor->endereco->estado) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static" for="cep">CEP</label>
                            <input disabled="true"type="text" class="form-control input-stl" id="cep" name="cep" placeholder="" value="{{ old('cep', $produtor->endereco->cep) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Ponto de Referencia</label>
                        <textarea disabled="true"class="form-control input-stl" id="ponto_referencia" name="ponto_referencia" rows="1">{{$produtor->endereco->ponto_referencia}}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Descrição</label>
                        <textarea disabled="true"class="form-control input-stl" id="descricao" name="descricao" rows="3">{{$produtor->endereco->descricao}}</textarea>
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
