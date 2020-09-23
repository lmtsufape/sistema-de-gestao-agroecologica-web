@extends('layouts.app')

@section('content')
<h2>CADASTRO DA OCS</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul style="padding: 0px;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('user.coordenador.cadastraroCS.salvar') }}">
    @csrf
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>CNPJ</label>
            <input type="number" class="form-control" id="cpnj" name="cnpj" placeholder="CNPJ">
        </div>
        <div class="col-md-6 mb-3">
            <label>Nome</label>
            <input type="text" class="form-control" id="nome_entidade" name="nome_entidade" placeholder="Email">
        </div>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-4">
            <label>Rua</label>
            <input type="text" class="form-control" name="nome_rua" placeholder="Rua">
        </div>
        <div class="col-md-2 mb-4">
            <label>Numero</label>
            <input type="number" class="form-control" name="numero_casa" placeholder="Numero">
        </div>
        <div class="col-md-4 mb-4">
            <label>Bairro</label>
            <input type="text" class="form-control" name="bairro" placeholder="Bairro">
        </div>
    </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
            </div>
            <div class="col-md-3 mb-3">
                <label>Estado</label>
                <select class="custom-select" id="estado" name="estado" placeholder="Estado">
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
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="">
            </div>
        </div>

        <div class="form-row">
        <div class="col-md-4 mb-4">
                <label for="data de nascimento">Telefone</label>
                <input type="number" class="form-control" name="telefone" placeholder="Telefone">
            </div>
            <div class="col-md-4 mb-4">
                <label>Celular</label>
                <input type="number" class="form-control" name="celular" placeholder="Celular">
            </div>
            <div class="col-md-4 mb-4">
                <label>Fax</label>
                <input type="number" class="form-control" name="fax" placeholder="FAX">
            </div>
        </div>
        
        <div class="form-group">
            <label>Ponto de Referencia</label>
            <textarea class="form-control" id="ponto_referencia" name="ponto_referencia" rows="1"></textarea>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
        </div>

    <button class="btn botao-submit" type="submit">Cadastrar</button>
</form>

<!--<div class="formulario">
    <form method="post" action="{{ route('user.coordenador.cadastraroCS.salvar') }}">
        @csrf

        <div class="grupo-informacoes">
            <div class="input-block">
                <input type="number" placeholder="CNPJ" name="cnpj" id="cnjp">
            </div>

            <div class="input-block">
                <input type="text" placeholder="Nome" name="nome_entidade" id="nome">
            </div>
        </div>

        <div class="input-block">
            <input type="email" placeholder="email" name="email" id="email">
        </div>

        <div class="grupo-informacoes">
            <div class="input-block">
                <input type="text" placeholder="Rua" name="nome_rua" id="nome_rua">
            </div>
            <div class="input-block">
                <input type="number" placeholder="Numero" name="numero_casa" id="numero_casa">
            </div>
        </div>

        <div class="input-block">
            <input type="text" placeholder="Bairro" name="bairro" id="bairro">
        </div>

        <div class="grupo-informacoes">
            <div class="input-block">
                <input type="text" placeholder="cidade" name="cidade" id="cidade">
            </div>
            <div class="input-block">
                <select name="estado" id="estado">
                    <option value="">Selecione o estado</option>
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
            <div class="input-block">
                <input type="number" placeholder="cep" name="cep" id="cep">
            </div>
        </div>

        <div class="grupo-informacoes">
            <div class="input-block">
                <input type="tel" placeholder="telefone" name="telefone" id="telefone">
            </div>
            <div class="input-block">
                <input type="tel" placeholder="celular" name="celular" id="celular">
            </div>
            <div class="input-block">
                <input type="tel" placeholder="fax" name="fax" id="fax">
            </div>
        </div>

        <div class="agrupar">
            <div class="input-block">
                <input type="text" placeholder="Orgão Ficalizador" name="orgao_fiscalizador" id="orgao_fiscalizador">
            </div>
            <div class="input-block">
                <input type="text" placeholder="Nome para Contato" name="nome_para_contato" id="nome_para_contato">
            </div>
        </div>

        <div class="agrupar">
                <div class="input-block">
                    <input type="text" placeholder="Pontos de Referencia" name="ponto_referencia" id="ponto_referencia">
                </div>
                <div class="input-block">
                    <textarea palceholder="Descrição" name="descricao" id="descricao" cols="30" rows="10"></textarea>
                </div>
            </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>-->
@endsection
