@extends('layouts.app')

@section('content')

<div class="row extra-space">
  <div class="col-md-12 upper-div">
    <div class="especifies">
      <br>




      <form class="formulario" method="" action="">
        <div class="row">
          <div class="col-md-12">
            <h1 class="marker">Minhas informações</h1>
          </div>
        </div>
        <hr class="outliner"></hr>
        <br>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul style="padding: 0px;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if(session()->has('Sucesso'))
        <div class="alert alert-success">
          {{ session()->get('Sucesso') }}
        </div>
        @endif
        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label class="mark">Informações básicas</label>
          </div>
          <div class="col-md-12 mb-3">
            <hr class="divider"></hr>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="label-static " for="nome">Nome Completo</label><br>
            <label class="label-ntstatic">{{ $produtor->nome}}</label>
          </div>
          <div class="col-md-6 mb-3">
            <label class="label-static " for="data de nascimento">Data de Nascimento</label><br>
            <label class="label-ntstatic">{{ $produtor->produtor->dataFormatada()}}</label>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="label-static " for="Email">CPF</label><br>
            <label class="label-ntstatic">{{ $produtor->email}}</label>
          </div>

          <div class="col-md-6 mb-4">
            <label class="label-static ">RG</label><br>
            <label class="label-ntstatic">{{ $produtor->produtor->rg}}</label>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="label-static">Telefone</label><br>
            <label class="label-ntstatic">{{ $produtor->telefone}}</label>
          </div>
          <div class="col-md-6 mb-3">
            <label class="label-static">Email</label><br>
            <label class="label-ntstatic">{{ $produtor->email2}}</label>
          </div>
        </div>
        @if($produtor->produtor->nome_conjuge)
        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label class="label-static">Nome do Conjuge</label><br>
            <label class="label-ntstatic">{{ $produtor->produtor->nome_conjuge}}</label>
          </div>
        </div>
        @endif
        @if($produtor->produtor->nome_filhos)
        <div class="form-group">
          <label class="label-static">Nome dos Filhos</label><br>
          <label class="label-ntstatic">{{ $produtor->produtor->nome_filhos}}</label>
        </div>
        @endif
        <br>
        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label class="mark">Endereço</label>
          </div>
          <div class="col-md-12 mb-3">
            <hr class="divider"></hr>
          </div>
        </div>
        @if($produtor->endereco->cep)
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="label-static ">Cidade</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->cidade}}</label>
          </div>
          <div class="col-md-3 mb-3">
            <label class="label-static ">Estado</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->estado}}</label>
          </div>
          <div class="col-md-3 mb-3">
            <label class="label-static" for="cep">CEP</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->cep}}</label>
          </div>
        </div>
        @else
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="label-static ">Cidade</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->cidade}}</label>
          </div>
          <div class="col-md-6 mb-3">
            <label class="label-static ">Estado</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->estado}}</label>
          </div>
        </div>
        @endif
        @if($produtor->endereco->nome_rua)
        <div class="form-row">
          <div class="col-md-6 mb-4">
            <label class="label-static">Logradouro</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->nome_rua}}</label>
          </div>
          <div class="col-md-2 mb-4">
            <label class="label-static">Número</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->numero_casa}}</label>
          </div>
          <div class="col-md-4 mb-4">
            <label class="label-static">Bairro</label><br>
            <label class="label-ntstatic">{{ $produtor->endereco->bairro}}</label>
          </div>
        </div>
        @endif
        @if($produtor->endereco->ponto_referencia)
        <div class="form-group">
          <label class="label-static">Ponto de Referência</label><br>
          <label class="label-ntstatic">{{ $produtor->endereco->ponto_referencia}}</label>
        </div>
        @endif

      </form>
    </div>
  </div>
</div>


@endsection
