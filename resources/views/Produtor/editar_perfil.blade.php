@extends('layouts.app')

@section('content')

<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
                <form class="formulario" method="post" action="{{ route('user.editarPerfil.salvar') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
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
                            <label class="label-static required" for="nome">Nome Completo</label>
                            <input type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Nome Completo" value="{{ old('nome', $produtor->nome) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-static required" for="data de nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control input-stl" name="data_nascimento" value="{{ old('data_nascimento', $produtor->produtor->data_nascimento) }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label class="label-static required" for="Email">CPF</label>
                            <input  type="number" class="form-control input-stl" id="email" name="email" value="{{ old('email', $produtor->email) }}">
                        </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                          <label class="label-static">Nome do Conjuge</label>
                          <input type="text" class="form-control input-stl" id="nome_conjuge" name="nome_conjugue" placeholder="Nome do Conjuge" value="{{ old('nome_conjuge', $produtor->nome_conjuge) }}">
                      </div>
                        <div class="col-md-6 mb-4">
                            <label class="label-static required">RG</label>
                            <input type="number" class="form-control input-stl" name="rg" placeholder="RG" value="{{ old('rg', $produtor->produtor->rg) }}">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Telefone</label>
                            <input type="tel" class="form-control input-stl" id="telefone" name="telefone" placeholder="Telefone" value="{{ old('telefone', $produtor->telefone) }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="label-static required">Email</label>
                            <input type="text" class="form-control input-stl" name="cpf" placeholder="Email" value="{{ old('email2', $produtor->email2) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label-static">Nome dos Filhos</label>
                        <textarea class="form-control input-stl" id="nome-filhos" name="nome_filhos" placeholder="Nome dos Filhos" rows="2"> {{$produtor->produtor->nome_filhos}} </textarea>
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
                        <div class="col-md-6 mb-3">
                            <label class="label-static required">Cidade</label>
                            <input type="text" class="form-control input-stl" id="cidade" name="cidade" placeholder="Cidade" value="{{ old('cidade', $produtor->endereco->cidade) }}">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="label-static required">Estado</label>
                            <input type="text" class="form-control input-stl" id="estado" name="estado" placeholder="Estado" value="{{ old('cidade', $produtor->endereco->estado) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="label-static" for="cep">CEP</label>
                            <input type="text" class="form-control input-stl" id="cep" name="cep" placeholder="" value="{{ old('cep', $produtor->endereco->cep) }}">
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-4">
                          <label class="label-static">Bairro</label>
                          <input type="text" class="form-control input-stl" name="bairro" placeholder="Bairro" value="{{ old('bairro', $produtor->endereco->bairro) }}">
                      </div>
                        <div class="col-md-6 mb-4">
                            <label class="label-static">Logradouro</label>
                            <input type="text" class="form-control input-stl" name="nome_rua" placeholder="Rua" value="{{ old('nome_rua', $produtor->endereco->nome_rua) }}">
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="label-static">Número</label>
                            <input type="number" class="form-control input-stl" name="numero_casa" placeholder="Numero" value="{{ old('numero_casa', $produtor->endereco->numero_casa) }}">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="label-static">Ponto de Referência</label>
                        <textarea class="form-control input-stl" id="ponto_referencia" name="ponto_referencia" rows="1">{{$produtor->endereco->ponto_referencia}}</textarea>
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
