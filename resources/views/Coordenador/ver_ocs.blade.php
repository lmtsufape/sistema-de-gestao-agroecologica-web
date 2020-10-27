@extends('layouts.app')

@section('content')

<h2>Informações da OCS</h2>
<div class="formulario">
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Nome da entidade</h4>
                <label>{{$ocs->nome_entidade}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>CNPJ</h4>
                <label>{{$ocs->cnpj}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Telefone</h4>
                <label>{{$ocs->telefone}}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Produtores</h4>
                @foreach($ocs->produtor as $pro)
                    <label>{{$pro->nome}}</label>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Coordenador responsável</h4>
                <label>{{$ocs->nome_para_contato}}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <h4>Órgão fiscalizador</h4>
                <label>{{$ocs->orgao_fiscalizador}}</label>
            </div>
        </div>
    </div>
</div>


@endsection
