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
                    <h1 class="marker">Informações da propriedade</h1>
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

            <div class="formulario">
                <form method="post" action="{{ route('user.editarPropriedade.salvar') }}">
                    @csrf
                    <div class="form-row inner-div">
                        <label class="">Informações básicas</label>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Tamanho total (HA)</label>
                            <input disabled="true" type="number" class="form-control input-stl" id="tamanho_total" name="tamanho_total" placeholder="Tamanho total da propriedade (Metros)" value="{{ old('tamanho_total', $propriedade->tamanho_total) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Fonte de Água</label>
                            <input disabled="true" type="text" class="form-control input-stl" id="fonte_de_agua" name="fonte_de_agua" placeholder="Fonte de água utilizada na propriedade" value="{{ old('fonte_de_agua', $propriedade->fonte_de_agua) }}">
                        </div>
                    </div>
                    <div class="form-row inner-div">
                        <label class="">Localização</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="label-static">Logradouro</label>
                            <input disabled="true" type="text" class="form-control input-stl" name="nome_rua" placeholder="Rua" value="{{ old('nome_rua', $propriedade->endereco->nome_rua) }}">
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="label-static">Número</label>
                            <input disabled="true" type="number" class="form-control input-stl" name="numero_casa" placeholder="Numero" value="{{ old('numero_casa', $propriedade->endereco->numero_casa) }}">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static">Bairro</label>
                            <input disabled="true" type="text" class="form-control input-stl" name="bairro" placeholder="Bairro" value="{{ old('bairro', $propriedade->endereco->bairro) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Cidade</label>
                            <input disabled="true" type="text" class="form-control input-stl" id="cidade" name="cidade" placeholder="Cidade" value="{{ old('cidade', $propriedade->endereco->cidade) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static required">Estado</label>
                            <input disabled="true" type="text" class="form-control input-stl" id="estado" name="estado" placeholder="estado" value="{{ old('estado', $propriedade->endereco->estado) }}">

                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static" for="cep">CEP</label>
                            <input disabled="true" type="text" class="form-control input-stl" id="cep" name="cep" placeholder="" value="{{ old('cep', $propriedade->endereco->cep) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Ponto de Referência</label>
                        <textarea disabled="true" class="form-control input-stl" id="ponto_referencia" name="ponto_referencia" rows="1">{{$propriedade->endereco->ponto_referencia}}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Descrição</label>
                        <textarea disabled="true" class="form-control input-stl" id="descricao" name="descricao" rows="3">{{$propriedade->endereco->descricao}}</textarea>
                    </div>

                    <hr class="outliner"></hr>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label style="color: red" class="label-static required">Campos obrigatórios</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button disabled="true" class="btn botao-submit" type="submit">Finalizar Edição</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
