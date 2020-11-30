@extends('layouts.app')

@section('content')

<div class="container-main">
    <div class="upper-div">
        <h1 class="marker">Minhas Informações</h1>
    </div>
    <br>
    <br>
    <div class="formulario upper-div">
        <h4 class="marker" style="text-align: center">Informações Básicas</h4>
        <center> <a href="{{ route('user.editar_perfil') }}"> <h4> Editar Perfil <h4> </a> </center>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Nome</h4>
                    <label class="label-ntstatic">{{$produtor->nome}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Cpf</h4>
                    <label class="label-ntstatic">{{$produtor->cpf}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Rg</h4>
                    <label class="label-ntstatic">{{$produtor->rg}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Telefone</h4>
                    <label class="label-ntstatic">{{$produtor->telefone}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Data de Nascimento</h4>
                    <label class="label-ntstatic">{{$produtor->data_nascimento}}</label>
                </div>
            </div>
            @if($produtor->nome_conjugue)
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Nome Conjugue</h4>
                    <label class="label-ntstatic">{{$produtor->nome_conjugue}}</label>
                </div>
            </div>
            @endif
            @if($produtor->nome_filhos)
            <div class="col-md-12">
                <div class="col-md-12">
                    <h4 class="label-static">Filhos</h4>
                    <label class="label-ntstatic">{{$produtor->nome_filhos}}</label>
                </div>
            </div>
            @endif
            <div class="col-md-12">
                <div class="col-md-12">
                    <h4 class="label-static">OCS</h4>
                    <label class="label-ntstatic">{{$produtor->ocs->nome_entidade}}</label>
                </div>
            </div>
        </div>
        <h4 class="marker" style="text-align: center">Endereço</h4>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Rua</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->nome_rua}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Bairro</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->bairro}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Nº</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->numero_casa}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Cidade</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->cidade}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">Estado</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->estado}}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h4 class="label-static">CEP</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->cep}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h4 class="label-static">Descricao</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->descricao}}</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <h4 class="label-static">Ponto de Referência</h4>
                    <label class="label-ntstatic">{{$produtor->endereco->ponto_referencia}}</label>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
