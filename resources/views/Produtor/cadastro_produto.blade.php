<script>
function showDiv(id, id1, id2) {
    document.getElementById(id).style.display = "block";
    document.getElementById("std").style.display = "block";
    document.getElementById(id1).style.display = "none";
    document.getElementById(id2).style.display = "none";
}

</script>
@extends('layouts.app')
@section('content')

<div class="upper-div">
    <h1 class="marker">Cadastro de produto</h1>
</div>
<br>
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
<div class="formulario upper-div">
    <div class="form-row">
        <div class="col-md-12">
            <div style="text-align: center" class="col-md-12">
                <h3 class="marker">Produção:</h3>
            </div>
        </div>
    </div>
    <form class="formulario" method="post" id="testForm" action="{{ route('user.produto.salvar') }}">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label class="label-static">Animal:</label>
                <input value="Animal" type="radio" name="tipo" onclick="showDiv('animais', 'Vegetais', 'Beneficiados')">
            </div>
            <div class="col-md-4 mb-3">
                <label class="label-static">Vegetal:</label>
                <input value="Vegetal" class="command_hidden" type="radio" name="tipo" onclick="showDiv('Vegetais', 'animais', 'Beneficiados')">
            </div>
            <div class="col-md-4 mb-3">
                <label class="label-static">Beneficiamento:</label>
                <input value="Beneficiamento" type="radio" name="tipo" onclick="showDiv('Beneficiados', 'Vegetais', 'animais')">
                <br>
                <br>
            </div>
        </div>
        <div class="form-row hidden" id="std">
            <div class="col-md-12 mb-3">
                <label class="label-static">Nome do produto:</label>
                <input type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Ex:. Vaca leiteira, Galinha, Pato">
                <br>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <div class="hidden" id="animais">
                    <label class="label-static">Utilização Animal:</label>
                    <input type="text" class="form-control input-stl" id="utilizacao_animal" name="utilizacao_animal">
                    <br>
                    <label class="label-static">Produz leite?</label>
                    <br>
                    <label class="label-static">Sim</label>
                    <input type="radio" name="produz_leite" value="1">
                    <label class="label-static">Não</label>
                    <input type="radio" name="produz_leite" value="0">
                    <br>
                    <br>
                    <label class="label-static">Técnicas de Manejo:</label>
                    <br>
                    <br>
                    @foreach($manejo as $an)
                        @if($an->tipo_manejo == "Animal")
                            <label class="label-static">{{$an->nome_tecnica}}</label>
                            <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
                            <br>
                            <label class="label-static">{{$an->manejo}}</label>
                            <br>
                            <br>
                        @endif
                    @endforeach
                    <br>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <div class="hidden" id="Vegetais">
                    <label class="label-static">Classe de plantas:</label>
                    <input type="text" class="form-control input-stl" id="classe_planta" name="classe_planta" placeholder="Ex:. Hotaliças">
                    <br>
                    <br>
                    <label class="label-static">Técnicas de Manejo:</label>
                    <br>
                    <br>
                    @foreach($manejo as $an)
                        @if($an->tipo_manejo == "Vegetal")
                            <label class="label-static">{{$an->nome_tecnica}}</label>
                            <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
                            <br>
                            <label class="label-static">{{$an->manejo}}</label>
                            <br>
                            <br>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <div class="hidden" id="Beneficiados">
                    <label class="label-static">Lista de produtos exteriores</label>
                    <input type="text" class="form-control input-stl" id="lista_produtos_exteriores_beneficiado" name="lista_produtos_exteriores_beneficiado" placeholder="Produtos que não vem diretamente da propriedade. Ex:. Ovos, Mel">
                    <br>
                    <br>
                    <label class="label-static">Técnicas de Manejo:</label>
                    <br>
                    <br>
                    @foreach($manejo as $an)
                        @if($an->tipo_manejo == "Beneficiamento")
                            <label class="label-static">{{$an->nome_tecnica}}</label>
                            <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
                            <br>
                            <label class="label-static">{{$an->manejo}}</label>
                            <br>
                            <br>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <button class="btn botao-submit" type="submit">Cadastrar</button>
    </form>

</div>


@endsection
