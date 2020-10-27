@extends('layouts.app')

@section('content')

<h2>Minhas Informações</h2>
<div class="formulario">
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Nome</h4>
                <label>{{$produtor->nome}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Cpf</h4>
                <label>{{$produtor->cpf}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Rg</h4>
                <label>{{$produtor->rg}}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Telefone</h4>
                <label>{{$produtor->telefone}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Data de Nascimento</h4>
                <label>{{$produtor->data_nascimento}}</label>
            </div>
        </div>
        @if($produtor->nome_conjugue)
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Nome Conjugue</h4>
                <label>{{$produtor->nome_conjugue}}</label>
            </div>
        </div>
        @endif
        @if($produtor->nome_filhos)
        <div class="col-md-12">
            <div class="col-md-12">
                <h4>Filhos</h4>
                <label>{{$produtor->nome_filhos}}</label>
            </div>
        </div>
        @endif
        <div class="col-md-12">
            <div class="col-md-12">
                <h4>OCS</h4>
                <label>{{$produtor->ocs->nome_entidade}}</label>
            </div>
        </div>
    </div>
    <h3 style="text-align: center">Endereço</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Rua</h4>
                <label>{{$produtor->endereco->nome_rua}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Bairro</h4>
                <label>{{$produtor->endereco->bairro}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Nº</h4>
                <label>{{$produtor->endereco->numero_casa}}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Cidade</h4>
                <label>{{$produtor->endereco->cidade}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Estado</h4>
                <label>{{$produtor->endereco->estado}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>CEP</h4>
                <label>{{$produtor->endereco->cep}}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <h4>Descricao</h4>
                <label>{{$produtor->endereco->descricao}}</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h4>Ponto de Referência</h4>
                <label>{{$produtor->endereco->ponto_referencia}}</label>
            </div>
        </div>
    </div>
</div>


@endsection
