@extends('layouts.app2')
@section('content')


<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>

            <form class="formulario" method="post" action="{{ route('associacao.editarAssociacao.salvar') }}">
            @csrf
            <div class="row">
                <div class="col-md-10">
                    <h1 class="marker">Editar associação</h1>
                </div>
            </div>
            <hr class="outliner"></hr>
            <br>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Dados</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label class="label-static required">Nome</label>
                    <input type="text" class="form-control input-stl" id="nome_entidade" name="nome" placeholder="Nome Completo" value="{{ old('nome', $associacao->user->nome) }}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label class="label-static required" for="Email">CNPJ</label>
                    <input type="number" class="form-control input-stl" id="email" name="email" value="{{ old('email', $associacao->user->email) }}">
                </div>
            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                  <label class="label-static">Email</label>
                  <input type="text" class="form-control input-stl" id="email2" name="email2" placeholder="Email" value="{{ old('email2', $associacao->user->email2) }}">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                  <label class="label-static required">Telefone</label>
                  <input type="text" class="form-control input-stl" id="telefone" name="telefone" placeholder="Telefone da OCS" value="{{ old('telefone', $associacao->user->telefone) }}">
              </div>
                <div class="col-md-6 mb-4">
                    <label class="label-static">Celular</label>
                    <input  class="form-control input-stl" type="number" class="form-control" name="celular" placeholder="Celular" value="{{ old('telefone', $associacao->celular) }}">
                </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Endereço</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-8">
                  <label class="label-static required">Cidade</label>
                  <input type="text" class="form-control input-stl" id="cidade" name="cidade" value="{{ old('cidade',$associacao->user->endereco->cidade) }}">
              </div>
              <div class="col-md-4">
                  <label class="label-static required">Estado</label>
                  <input type="text" class="form-control input-stl" id="estado" name="estado" value="{{ old('estado', $associacao->user->endereco->estado) }}">
                  <br>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4">
                  <label class="label-static">Bairro</label>
                  <input type="text" class="form-control input-stl" id="bairro" name="bairro" placeholder="Bairro da associação" value="{{ old('bairro', $associacao->user->endereco->bairro) }}">
                  <br>
              </div>
                <div class="col-md-6">
                    <label class="label-static">Logradouro</label>
                    <input type="text" class="form-control input-stl" id="nome_rua" name="nome_rua" placeholder="Logradouro da associação" value="{{ old('nome_rua', $associacao->user->endereco->nome_rua) }}">
                </div>
                <div class="col-md-2">
                    <label class="label-static">Nº</label>
                    <input type="text" class="form-control input-stl" id="numero_casa" name="numero_casa" value="{{ old('numero_casa', $associacao->user->endereco->numero_casa) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="label-static">CEP</label>
                    <input type="text" class="form-control input-stl" id="cep" name="cep" value="{{ old('cep', $associacao->user->endereco->cep) }}">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="label-static">Ponto de Referência</label>
                    <textarea type="text" class="form-control input-stl" id="ponto_referencia" name="ponto_referencia">{{ $associacao->user->endereco->ponto_referencia}}</textarea>
                    <br>
                </div>
            </div>
            <hr class="outliner"></hr>
            <div class="row">
              <div class="col-md-8 mb-3">
                <label style="color: red" class="label-static required">Campos obrigatórios</label>
              </div>
              <div class="col-md-4 mb-3">
                <button class="btn botao-submit bg-verde" type="submit">Atualizar</button>
              </div>
            </div>
            </form>

    </div>
  </div>
</div>

@endsection
