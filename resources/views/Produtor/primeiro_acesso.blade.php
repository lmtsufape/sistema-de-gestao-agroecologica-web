@extends('layouts.app')

@section('content')
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>

            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Finalizar perfil</h1>
                </div>
                </div>
                <div class="row esp">
                    <div class="col-md-12">
                        <hr class="outliner"></hr>
                    </div>
                </div>
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

            <form class="formulario" method="post" action="{{ route('user.primeiro_acesso_salvar') }}">
                @csrf
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label class="mark">Informações básicas</label>
                  </div>
                  <div class="col-md-12 mb-3">
                    <hr class="divider"></hr>
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="label-static required" for="nome">Nome Completo</label>
                        <input type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Nome Completo" value="{{ old('nome', $produtor->nome) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="label-static required" for="Email">CPF</label>
                        <input type="number" class="form-control input-stl" id="email" name="email" placeholder="CPF, 11 números" value="{{ old('email', $produtor->email) }}">
                    </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                      <label class="label-static">Email</label>
                      <input type="text" class="form-control input-stl" name="email2" placeholder="Email para contato" value="{{ old('email2', $produtor->email2) }}">
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="label-static required" for="data de nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control input-stl" name="data_nascimento">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-static required">RG</label>
                        <input type="number" class="form-control input-stl" name="rg" placeholder="RG">
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label class="label-static">Nome do Conjuge</label>
                        <input type="text" class="form-control input-stl" id="nome_conjuge" name="nome_conjugue" placeholder="Nome do Conjuge">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="label-static required">Telefone</label>
                        <input type="tel" class="form-control input-stl" id="telefone" name="telefone" placeholder="Telefone">
                    </div>
                </div>

                <div class="form-group">
                    <label class="label-static">Nome dos Filhos</label>
                    <textarea class="form-control input-stl" id="nome-filhos" name="nome_filhos" placeholder="Nome dos Filhos" rows="2"></textarea>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="label-static required" for="senha">Senha</label>
                        <input type="password" class="form-control input-stl" id="senha" name="password" placeholder="Senha">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="label-static required" for="confirmar senha">Confirmar Senha</label>
                        <input type="password" class="form-control input-stl" id="senha" name="password" placeholder="Senha">
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
                    <div class="col-md-6 mb-4">
                        <label class="label-static">Logradouro</label>
                        <input type="text" class="form-control input-stl" name="nome_rua" placeholder="Rua">
                    </div>
                    <div class="col-md-2 mb-4">
                        <label class="label-static">Número</label>
                        <input type="number" class="form-control input-stl" name="numero_casa" placeholder="Numero">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="label-static">Bairro</label>
                        <input type="text" class="form-control input-stl" name="bairro" placeholder="Bairro">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="label-static required">Cidade</label>
                        <input type="text" class="form-control input-stl" id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="label-static required ">Estado</label>
                        <select class="custom-select input-stl"  style="height: 42px;" id="estado" name="estado" placeholder="Estado">
                            <option selected disabled value="">Selecionar Estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="label-static" for="cep">CEP</label>
                        <input type="text" class="form-control input-stl" id="cep" name="cep" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="label-static">Ponto de Referência</label>
                    <textarea class="form-control input-stl" id="ponto_referencia" name="ponto_referencia" rows="1"></textarea>
                </div>
                <button class="btn botao-submit bg-verde" type="submit">Finalizar Perfil</button>
                <br>
                <br>
            </form>
        </div>
    </div>
</div>

@endsection
