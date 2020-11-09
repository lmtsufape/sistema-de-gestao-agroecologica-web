@extends('layouts.app')

@section('content')

<div class="container-main">
    <div class="upper-div">
        <h1 class="marker">Informações da OCS</h1>
        <center> <a href="{{ route('user.coordenador.editarOcs') }}"> <h4> Editar Ocs <h4> </a> </center>
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
            <h4 class="marker" style="text-align: center">Endereço</h4>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Rua</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->nome_rua}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Bairro</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->bairro}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Nº</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->numero_casa}}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Cidade</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->cidade}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">Estado</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->estado}}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <h4 class="label-static">CEP</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->cep}}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <h4 class="label-static">Descricao</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->descricao}}</label>
                    </div>
                    <br>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <h4 class="label-static">Ponto de Referência</h4>
                        <label class="label-ntstatic">{{$ocs->endereco->ponto_referencia}}</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 d-flex justify-content-center">
                    <a href="{{route('home')}}">
                        <img class="imagem-menor" src="{{ asset('images/meeting.png') }}" alt="">
                        <span class="marker-link">Reuniões</span>
                    </a>
                </div>
                <div style="margin-top: 10px;" class="col-md-4 d-flex justify-content-center">
                    <a href="{{route('user.coordenador.listar_produtores')}}">
                        <img class="imagem-menor" src="{{ asset('images/eye.png') }}" alt="">
                        <span class="marker-link">Produtores</span>
                    </a>
                </div>
                <div style="margin-top: 10px;" class="col-md-4 d-flex justify-content-center">
                    <a href="{{route('user.coordenador.cadastrarProdutor')}}">
                        <img class="imagem-menor" src="{{ asset('images/rounded-add-button.png') }}" alt="">
                        <span class="marker-link">Cadastrar Produtor</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
