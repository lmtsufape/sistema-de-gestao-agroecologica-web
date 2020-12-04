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
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Nova produção</h1>
                </div>
            </div>
            <hr class="divider"></hr>

            {{-- Novo canteiro modal --}}

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="padding: 0px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <br>

            <div class="formulario">
                <div class="inner-div">
                    <label class="">Produção</label>
                </div>
                <form class="formulario" method="post" id="testForm" action="{{ route('user.canteiroProducao.producao.salvar') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="label-static">Animal:</label>
                            <input value="Animal" type="radio" name="tipo_producao" onclick="showDiv('animais', 'Vegetais', 'Beneficiados')">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="label-static">Vegetal:</label>
                            <input value="Vegetal" class="command_hidden" type="radio" name="tipo_producao" onclick="showDiv('Vegetais', 'animais', 'Beneficiados')">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="label-static">Beneficiamento:</label>
                            <input value="Beneficiamento" class="command_hidden" type="radio" name="tipo_producao" onclick="showDiv('Beneficiados', 'Vegetais', 'animais')">
                        </div>
                    </div>
                    <input type="hidden" name="id_canteirodeproducao" value="{{$canteiro}}">
                    <div class="row hidden" id="std">
                        <div class="col-md-12 mb-3">
                            <label class="label-static">Observações</label>
                            <input type="text" class="form-control input-stl" id="observacoes" name="observacoes">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="label-static required">Data de inicio da produção:</label>
                            <input type="date" class="form-control input-stl" id="data_inicio" name="data_inicio">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="hidden" id="animais">
                                <label class="label-static required">Produtos da produção:</label>
                                <br>
                                <br>
                                @foreach($produtos as $an)
                                @if($an->tipo == "Animal")
                                <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
                                <label class="label-static">{{$an->nome}}</label>
                                <br>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="Vegetais">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="label-static required">Produtos da produção:</label>
                                <br>
                                <br>
                                @foreach($produtos as $an)
                                @if($an->tipo == "Vegetal")
                                <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
                                <label class="label-static">{{$an->nome}}</label>
                                <br>
                                <br>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="hidden" id="Beneficiados">
                                <label class="label-static">Lista de produtos exteriores</label>
                                <input type="text" class="form-control input-stl" id="lista_produtos_exteriores_beneficiado" name="lista_produtos_exteriores_beneficiado" placeholder="Produtos que não vem diretamente da propriedade. Ex:. Ovos, Mel">
                                <br>
                                <br>
                                <label class="label-static required">Produtos da produção:</label>
                                <br>
                                <br>
                                @foreach($produtos as $an)
                                @if($an->tipo == "Beneficiamento")
                                <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
                                <label class="label-static">{{$an->nome}}</label>
                                <br>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
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
