@extends('layouts.app')

@section('content')

<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-7">
                    <h1 class="marker">Ocs</h1>
                </div>
            </div>

            <div class="formulario">
                <hr class="divider"></hr>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="padding: 0px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-row inner-div">
                    <label class="">Informações</label>
                </div>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static required">Nome da entidade</label><br>
                        <label class="label-ntstatic">{{$ocs->nome_entidade}}</label>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static required">CNPJ</label><br>
                        <label class="label-ntstatic">{{$ocs->cnpj}}</label>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static required">Telefone</label><br>
                        <label class="label-ntstatic">{{$ocs->telefone}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static required">Email</label><br>
                        <label class="label-ntstatic">{{$ocs->email}}</label>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="label-static">Celular</label><br>
                        <label class="label-ntstatic">{{$ocs->celular}}</label>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="label-static">Fax</label><br>
                        <label class="label-ntstatic">{{$ocs->fax}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="label-static">Coordenador responsável</label><br>
                        <label class="label-ntstatic"><b>{{$ocs->nome_para_contato}}</b></label>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <label class="label-static required">Órgão fiscalizador</label><br>
                        <label class="label-ntstatic">{{$ocs->orgao_fiscalizador}}</label>
                    </div>

                    <div class="col-md-5 repos">
                        <br>
                        <label class="label-static">Produtores</label>
                            <table class="table">
                                <tbody class="wrp">
                                    @foreach($ocs->produtor as $pro)
                                    <tr>
                                        <td class="cor-texto basic-space">{{$pro->nome}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                    </div>
                </div>
                <br>
                <div class="form-row inner-div">
                    <label class="">Endereço</label>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static">Rua</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->nome_rua}}</label>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static">Bairro</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->bairro}}</label>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static">Nº</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->numero_casa}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static required">Cidade</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->cidade}}</label>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static required">Estado</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->estado}}</label>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static required">CEP</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->cep}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="label-static">Descricao</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->descricao}}</label>
                        <br>
                    </div>
                    <div class="col-md-12">
                        <label class="label-static required">Ponto de Referência</label><br>
                        <label class="label-ntstatic">{{$ocs->endereco->ponto_referencia}}</label>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
