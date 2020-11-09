@extends('layouts.app')

@section('content')

<div class="upper-div">
    <h1 class="marker">Informações sobre a propriedade</h1>
</div>
<br>
<br>
<div class="formulario upper-div">
    <h3 class="marker" style="text-align: center">Informações Básicas</h3>
    <center> <a href="{{ route('user.editarPropriedade') }}"> <h4> Editar Propriedade <h4> </a> </center>
    <center> <button class="bt-canteiro">
        <a href="">
            <img class="imagem-menor" src="{{ asset('images/clock.png') }}" alt="">
            <span style="color: red">Histórico da Propriedade</span>
        </a>
    </button> </center>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h4 class="label-static-2">Tamanho total (Metros)</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->tamanho_total}}</h5>
        </div>
        <div class="col-md-6">
            <h4 class="label-static-2">Fonte de água</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->fonte_de_agua}}</h5>
        </div>
    </div>
    <br>
    <br>
    <h3 class="marker" style="text-align: center">Endereço</h3>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h4 class="label-static-2">Rua</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->nome_rua}}</h5>
        </div>
        <div class="col-md-4">
            <h4 class="label-static-2">Bairro</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->bairro}}</h5>
        </div>
        <div class="col-md-4">
            <h4 class="label-static-2">Nº</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->numero_casa}}</h5>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h4 class="label-static-2">Cidade</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->cidade}}</h5>
        </div>
        <div class="col-md-4">
            <h4 class="label-static-2">Estado</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->estado}}</h5>
        </div>
        <div class="col-md-4">
            <h4 class="label-static-2">CEP</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->cep}}</h5>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4 class="label-static-2">Descrição</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->descricao}}</h5>
        </div>
        <div class="col-md-6">
            <h4 class="label-static-2">Ponto de Referência</h4>
            <h5 class="label-ntstatic-2">{{$propriedade->endereco->ponto_referencia}}</h5>
            <br>
        </div>
    </div>
    <br>

    <h3 class="marker" style="text-align: center">Canteiros de Produção:</h3>
    <div class="row">
        @iF(count($canteiros) > 0)
        @foreach($canteiros as $cant)
        <div class="col-md-12 d-flex justify-content-center">
            <a href="{{route('user.canteiroProducao.ver', ['id_canteiro' => $cant->id])}}">
                <img class="imagem-menor" src="{{ asset('images/agriculture.png') }}" alt="">
                <span class="label-ntstatic" >{{$cant->localizacao}}</span>
            </a>
            <br>
            <br>
        </div>
        @endforeach
        @endif
        <br>
        <div class="col-md-12 d-flex justify-content-center">
            <a href="{{route('user.canteiroProducao.cadastrar')}}">
                <img class="imagem-menor" src="{{ asset('images/rounded-add-button.png') }}" alt="">
                <span class="marker-link">Cadastrar canteiro de produção</span>
            </a>
        </div>
    </div>
</div>
<br>
<br>


@endsection
