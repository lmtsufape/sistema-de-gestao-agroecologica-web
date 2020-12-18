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

<div class="row container-conteudo">
    <div class="col-md-12">
        <div class="especifies upper-div">
            <br>

            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Minhas informações</h1>
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
                <form method="post" action="{{ route('user.salvarCadastrarPropriedade') }}">
                    @csrf
                    <div class="form-row inner-div">
                        <label class="">Informações básicas</label>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Tamanho total (Metros)</label>
                            <input  type="number" class="form-control input-stl" id="tamanho_total" name="tamanho_total" placeholder="Tamanho total da propriedade (Metros)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Fonte de Água</label>
                            <input  type="text" class="form-control input-stl" id="fonte_de_agua" name="fonte_de_agua" placeholder="Fonte de água utilizada na propriedade">
                        </div>
                    </div>
                    <div class="form-row inner-div">
                        <label class="">Localização</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="label-static">Rua</label>
                            <input  type="text" class="form-control input-stl" name="nome_rua" placeholder="Rua">
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="label-static">Numero</label>
                            <input  type="number" class="form-control input-stl" name="numero_casa" placeholder="Numero">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static">Bairro</label>
                            <input  type="text" class="form-control input-stl" name="bairro" placeholder="Bairro">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Cidade</label>
                            <input  type="text" class="form-control input-stl" id="cidade" name="cidade" placeholder="Cidade">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static required">Estado</label>
                            <select  class="custom-select" id="estado" name="estado" placeholder="Estado">
                                <option selected disabled value="">Selecionar Estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static" for="cep">CEP</label>
                            <input  type="text" class="form-control input-stl" id="cep" name="cep" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Ponto de Referencia</label>
                        <textarea  class="form-control input-stl" id="ponto_referencia" name="ponto_referencia" rows="1"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Descrição</label>
                        <textarea  class="form-control input-stl" id="descricao" name="descricao" rows="3"></textarea>
                    </div>

                    <hr class="outliner"></hr>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label style="color: red" class="label-static required">Campos obrigatórios</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button class="btn botao-submit" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
