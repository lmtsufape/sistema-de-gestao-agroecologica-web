@extends('layouts.app2')
@section('content')


<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Informações da associação</h1>
                </div>
            </div>
            <hr class="outliner"></hr>
            @if(session()->has('Sucesso'))
            <div class="alert alert-success">
                {{ session()->get('Sucesso') }}
            </div>
            @endif
            <br>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Dados</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="label-static ">Nome</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->nome}}</label>
                </div>
                <div class="col-md-4">
                    <label class="label-static ">CNPJ</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->email}}</label>
                </div>
                <div class="col-md-4">
                    <label class="label-static ">Email</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->email2}}</label>
                </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                  <label class="label-static ">Telefone</label><br>
                  <label class="label-ntstatic">{{ $associacao->user->telefone}}</label>
              </div>
              @if($associacao->celular)
                <div class="col-md-6">
                    <label class="label-static">Celular</label><br>
                    <label class="label-ntstatic">{{ $associacao->celular}}</label>
                </div>
              @endif
            </div>
            <br>
            <br>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Endereço</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <div class="row">
              @if($associacao->user->endereco->nome_rua)
                <div class="col-md-4">
                    <label class="label-static">Logradouro</label> <br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->nome_rua}}</label>
                </div>
              @endif
              @if($associacao->user->endereco->bairro)
                <div class="col-md-4">
                    <label class="label-static">Bairro</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->bairro}}</label>
                    <br>
                </div>
              @endif
              @if($associacao->user->endereco->numero_casa)
                <div class="col-md-4">
                    <label class="label-static">Nº</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->numero_casa}}</label>
                </div>
              @endif
            </div>
            @if($associacao->user->endereco->cep)
            <div class="row">
                <div class="col-md-4">
                    <label class="label-static ">Cidade</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->cidade}}</label>
                </div>
                <div class="col-md-4">
                    <label class="label-static ">Estado</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->estado}}</label>
                    <br>
                </div>

                <div class="col-md-4">
                    <label class="label-static">CEP</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->cep}}</label>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-6">
                    <label class="label-static ">Cidade</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->cidade}}</label>
                </div>
                <div class="col-md-6">
                    <label class="label-static ">Estado</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->estado}}</label>
                    <br>
                </div>
            </div>
            @endif
            <br>
            @if($associacao->user->endereco->ponto_referencia)
            <div class="row">
                <div class="col-md-12">
                    <label class="label-static">Ponto de Referência</label><br>
                    <label class="label-ntstatic">{{ $associacao->user->endereco->ponto_referencia}}</label>
                    <br>
                </div>
            </div>
            @endif
    </div>
  </div>
</div>

@endsection
