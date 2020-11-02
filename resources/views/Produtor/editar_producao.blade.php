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
<div class="container-main">
    <div class="upper-div">
        <h1 class="marker">Cadastrar produção para o canteiro</h1>
    </div>


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
    <br>

    <div class="formulario upper-div">
        <form class="formulario" method="post" id="testForm" action="{{ route('user.canteiroProducao.producao.salvarEditar') }}">
            @csrf
            <div class="form-row">
                <div class="col-md-12">
                    <div style="text-align: center" class="col-md-12">
                        <h3 class="marker">Produção:</h3>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label class="label-static">Animal:</label>
                    <input value="Animal" type="radio" name="tipo_producao" onclick="showDiv('animais', 'Vegetais', 'Beneficiados')" {{ $producao->tipo_producao == 'Animal' ? 'selected' : ''}}>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-static">Vegetal:</label>
                    <input value="Vegetal" class="command_hidden" type="radio" name="tipo_producao" onclick="showDiv('Vegetais', 'animais', 'Beneficiados')" {{ $producao->tipo_producao == 'Vegetal' ? 'selected' : ''}}>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-static">Beneficiamento:</label>
                    <input value="Beneficiamento" class="command_hidden" type="radio" name="tipo_producao" onclick="showDiv('Beneficiados', 'Vegetais', 'animais')" {{ $producao->tipo_producao == 'Beneficiamento' ? 'selected' : ''}}>
                </div>
            </div>
            <input type="hidden" name="id_canteirodeproducao" value="{{ old('canteirodeproducaos', $producao->canteirodeproducaos) }}">
            <input type="hidden" name="id_producao" value="{{ $producao->id }}">
            <div class="form-row hidden" id="std">
                <div class="col-md-12 mb-3">
                    <label class="label-static">Observações</label>
                    <input type="text" class="form-control input-stl" value="{{ old('observacoes', $producao->observacoes) }}" id="observacoes" name="observacoes">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <div class="hidden" id="animais">
                        <label class="label-static">Produtos da produção:</label>
                        <br>
                        <br>
                        @foreach($produtos as $an)
                            @if($an->tipo == "Animal")
                                <label class="label-static-2">{{$an->nome}}</label>
                                <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
                                <br>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hidden" id="Vegetais">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                            <label class="label-static">Produtos da produção:</label>
                            <br>
                            <br>
                            @foreach($produtos as $an)
                                @if($an->tipo == "Vegetal")
                                    <label class="label-static-2">{{$an->nome}}</label>
                                    <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
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
                        <input type="text" class="form-control input-stl" id="lista_produtos_exteriores_beneficiado" value="{{ old('lista_produtos_exteriores_beneficiado', $producao->lista_produtos_exteriores_beneficiado) }}" name="lista_produtos_exteriores_beneficiado" placeholder="Produtos que não vem diretamente da propriedade. Ex:. Ovos, Mel">
                        <br>
                        <br>
                        <label class="label-static">Produtos da produção:</label>
                        <br>
                        <br>
                        @foreach($produtos as $an)
                            @if($an->tipo == "Beneficiamento")
                                <label class="label-static">{{$an->nome}}</label>
                                <input value="{{$an->id}}" class="checkbox" type="checkbox" name="idsman[]">
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
</div>


@endsection
