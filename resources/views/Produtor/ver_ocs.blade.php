@extends('layouts.app')
@section('content')
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>


            <div class="formulario">
              <div class="row">
                  <div class="col-md-7">
                      <h1 class="marker">Ocs</h1>
                  </div>
              </div>
                <hr class="outliner"></hr>
                <br>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label class="mark">Informações básicas</label>
                  </div>
                  <div class="col-md-12 mb-3">
                    <hr class="divider"></hr>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="label-static">Nome</label><br>
                        <label class="label-ntstatic"><b>{{$ocs->nome_ocs}}</b></label>
                        <br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <label class="label-static">Membro responsável</label><br>
                        <label class="label-ntstatic"><b>
                          @foreach($ocs->produtor as $pro)
                            @if($pro->user->tipo_perfil == "Coordenador")
                            {{$pro->user->nome}}
                            @endif
                          @endforeach</b></label>
                    </div>

                    <div class="col-md-5">
                        <label class="label-static">Membros</label>
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
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label class="mark">Informações da associação</label>
                  </div>
                  <div class="col-md-12 mb-3">
                    <hr class="divider"></hr>
                  </div>
                </div>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label class="label-static ">Nome da entidade</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->nome}}</label>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static ">CNPJ</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->email}}</label>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="label-static ">Telefone</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->telefone}}</label>
                    </div>
                </div>
                <div class="row">
                  @if($ocs->associacao->user->email2)
                    <div class="col-md-6">
                        <label class="label-static ">Email</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->email2}}</label>
                    </div>
                  @endif
                  @if($ocs->associacao->user->celular)
                    <div class="col-md-6 mb-4">
                        <label class="label-static">Celular</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->celular}}</label>
                    </div>
                  @endif
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label class="mark">Endereço da associação</label>
                  </div>
                  <div class="col-md-12 mb-3">
                    <hr class="divider"></hr>
                  </div>
                </div>
                @if($ocs->associacao->user->endereco->nome_rua)
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
                @endif
                @if($ocs->associacao->user->endereco->cep)
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
                @else
                <div class="row">
                    <div class="col-md-6">
                        <label class="label-static ">Cidade</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->cidade}}</label>
                    </div>
                    <div class="col-md-6">
                        <label class="label-static ">Estado</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->estado}}</label>
                        <br>
                    </div>
                </div>
                @endif
                @if($ocs->associacao->user->endereco->ponto_referencia)
                <div class="row">
                    <div class="col-md-12">
                        <label class="label-static">Ponto de referência</label><br>
                        <label class="label-ntstatic">{{$ocs->associacao->user->endereco->ponto_referencia}}</label>
                        <br>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
