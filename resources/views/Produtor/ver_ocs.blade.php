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
                    <label class="">Informações da OCS</label>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="label-static">Nome da OCS</label><br>
                        <label class="label-ntstatic"><b>{{$ocs->nome_ocs}}</b></label>
                        <br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="label-static">Coordenador responsável</label><br>
                        <label class="label-ntstatic"><b>
                          @foreach($ocs->produtor as $pro)
                            @if($pro->user->tipo_perfil == "Coordenador")
                            {{$pro->user->nome}}
                            @endif
                          @endforeach</b></label>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <label class="label-static ">Órgão fiscalizador</label><br>
                        <label class="label-ntstatic">{{$ocs->orgao_fiscalizador}}</label>
                    </div>

                    <div class="col-md-5 repos">
                        <br>
                        <label class="label-static">Produtores</label>
                            <table class="table">
                                <tbody class="wrp">
                                    @foreach($ocs->produtor as $pro)
                                    @if(!$pro->perfil_coordenador || $pro->perfil_coordenador == "Produtor")
                                    <tr>
                                        <td class="cor-texto basic-space">{{$pro->user->nome}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>

                            </table>
                    </div>
                </div>
                <div class="form-row inner-div">
                    <label class="">Informações da Associação</label>
                </div>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static ">Nome da entidade</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->nome}}</label>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static ">CNPJ da associação</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->cnpj}}</label>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static ">Telefone</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->telefone}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static ">Email</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->email}}</label>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="label-static">Celular</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->celular}}</label>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="label-static">Fax</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->fax}}</label>
                    </div>
                </div>
                <br>
                <div class="form-row inner-div">
                    <label class="">Endereço da associação</label>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static">Logradouro</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->nome_rua}}</label>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static">Bairro</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->bairro}}</label>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static">Nº</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->numero_casa}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static ">Cidade</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->cidade}}</label>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static ">Estado</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->estado}}</label>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static ">CEP</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->cep}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="label-static">Descrição</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->descricao}}</label>
                        <br>
                    </div>
                    <div class="col-md-12">
                        <label class="label-static">Ponto de referência</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->ponto_referencia}}</label>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
