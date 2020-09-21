@extends('layouts.app')

@section('content')
<h2>CADASTRO DA OCS</h2>

<div class="formulario">
    <form method="post" action="{{ route('user.coordenador.cadastrarOcs.salvar') }}">
        @csrf

        <div class="grupo-informacoes">
            <div class="input-block">
                <input type="number" placeholder="CNPJ" name="cnpj" id="cnjp">
            </div>

            <div class="input-block">
                <input type="text" placeholder="Nome" name="nome" id="nome">
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

        <button type="submit">Cadastrar</button>
    </form>
</div>
@endsection
