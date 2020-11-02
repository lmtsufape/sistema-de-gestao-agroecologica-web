@extends('layouts.app')

@section('content')

<div class="container-main">
    <div class="upper-div">
        <h1 class="marker">Informações da OCS</h1>
        <div class="formulario">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Nome da entidade</h4>
                        <label>{{$ocs->nome_entidade}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">CNPJ</h4>
                        <label>{{$ocs->cnpj}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Telefone</h4>
                        <label>{{$ocs->telefone}}</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Produtores</h4>
                        @foreach($ocs->produtor as $pro)
                            <label>{{$pro->nome}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Coordenador responsável</h4>
                        <label>{{$ocs->nome_para_contato}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Órgão fiscalizador</h4>
                        <label>{{$ocs->orgao_fiscalizador}}</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-6 d-flex justify-content-center">
                    <a href="{{route('home')}}">
                        <img class="imagem-menor" src="{{ asset('images/rounded-add-button.png') }}" alt="">
                        <span class="marker-link">Reuniões</span>
                    </a>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <a href="{{route('home')}}">
                        <img class="imagem-menor" src="{{ asset('images/rounded-add-button.png') }}" alt="">
                        <span class="marker-link">Produtores</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
