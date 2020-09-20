@extends('layouts.app')

@section('content')
    <h2>CADASTRO DO PRODUTOR</h2>

    <div class="formulario">
        <form action="">
            @csrf

            <div class="input-block">
                <input type="text" placeholder="Nome Completo" name="nome" id="nome">
            </div>

            <div class="grupo-informacoes">
                <div class="input-block">
                    <input type="date" placeholder="Data de Nascimento" name="data_nascimento" id="data_nascimento">
                    </input>
                </div>
                <div class="input-block">
                    <input type="number" placeholder="RG" name="rg" id="rg">
                </div>
            </div>


            <div class="input-block">
                <input type="number" placeholder="CPF" name="cpf" id="cpf">
            </div>
            <div class="input-block">
                <input type="text" placeholder="Nome do Cônjuge" name="nome_conjuge" id="nome_conjuge">
            </div>

            <div class="grupo-informacoes">
                <div class="input-block">
                    <input type="number" placeholder="CPF do Cônjuge" name="cpf_conjuge" id="cpf_conjuge">
                </div>
                <div class="input-block">
                    <input type="date" placeholder="Data de Nascimento do Cônjuge" name="data_nascimento_conjuge" id="data_nascimento_conjuge">
                </div>
            </div>

            <div class="input-block">
                <input type="text" placeholder="Nome Dos Filhos" name="nomes-filhos" id="nomes-filhos">
            </div>
            <div class="input-block">
                <input type="text" placeholder="Rua" name="nome_rua" id="nome_rua">
            </div>
            <div class="input-block">
                <input type="number" placeholder="Rua" name="numero_casa" id="numero_casa">
            </div>
            <div class="input-block">
                <input type="text" placeholder="Bairro" name="bairro" id="bairro">
            </div>
            <div class="input-block">
                <input type="text" placeholder="cidade" name="cidade" id="cidade">
            </div>
            <div class="input-block">
                <input type="number" placeholder="cep" name="cep" id="cep">
            </div>
            <div class="input-block">
                <input type="text" placeholder="descricao" name="descricao" id="descricao">
            </div>
            <div class="input-block">
                <input type="text" placeholder="Pontos de Referencia" name="ponto_referencia" id="ponto_referencia">
            </div>

            <button type="submit">Cadastrar</button>
        </form>
=======
    <div class="main">
        <h2>CADASTRO DO PRODUTOR</h2>

        <div class="formulario">
            <form action="">
                @csrf
                <div class="input-block">
                    <!--<img src="../images/person.png" alt="">-->
                    <label for="nome">Nome Completo</label>
                    <input type="text" placeholder="Nome Completo" name="nome" id="nome">
                </div>

                <div class="input-block">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" placeholder="Data de Nascimento" name="data_nascimento" id="data_nascimento">
                </div>

                <div class="input-block">
                    <label for="rg">RG</label>
                    <input type="number" placeholder="RG" name="rg" id="rg">
                </div>

                <div class="input-block">
                    <label for="cpf">CPF</label>
                    <input type="number" placeholder="CPF" name="cpf" id="cpf">
                </div>

                <div class="input-block">
                    <label for="nome_conjuge">Nome Cônjuge</label>
                    <input type="text" placeholder="Nome do Cônjuge" name="nome_conjuge" id="nome_conjuge">
                </div>

                <div class="input-block">
                    <label for="cpf_conjuge">CPF do Conjuge</label>
                    <input type="number" placeholder="CPF do Cônjuge" name="cpf_conjuge" id="cpf_conjuge">
                </div>

                <div class="input-block">
                    <label for="nascimento_conjuge">Data de Nascimento</label>
                    <input type="date" placeholder="Data de Nascimento do Cônjuge" name="data_nascimento_conjuge" id="data_nascimento_conjuge">
                </div>

                <div class="input-block">
                    <label for="nomes-filhos">Nome dos Filhos</label>
                    <input type="text" placeholder="Nome Dos Filhos" name="nomes-filhos" id="nomes-filhos">
                </div>

                <div class="input-block">
                    <label for="Rua">Rua</label>
                    <input type="text" placeholder="Rua" name="nome_rua" id="nome_rua">
                </div>

                <div class="input-block">
                    <label for="numero_casa">Numero da Casa</label>
                    <input type="number" placeholder="Rua" name="numero_casa" id="numero_casa">
                </div>

                <div class="input-block">
                    <label for="Bairro">Bairro</label>
                    <input type="text" placeholder="Bairro" name="bairro" id="bairro">
                </div>

                <div class="input-block">
                    <label for="cidade">Cidade</label>
                    <input type="text" placeholder="cidade" name="cidade" id="cidade">
                </div>

                <div class="input-block">
                    <label for="cep">CEP</label>
                    <input type="number" placeholder="cep" name="cep" id="cep">
                </div>

                <div class="input-block">
                    <label for="descricao">Descrição</label>
                    <input type="text" placeholder="descricao" name="descricao" id="descricao">
                </div>

                <div class="input-block">
                    <label for="ponto_referencia">Pontos de Referência</label>
                    <input type="text" placeholder="Pontos de Referencia" name="ponto_referencia" id="ponto_referencia">
                </div>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>


@endsection

<script>
    var strCPF = document.querySelector("#cpf")
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;

        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

        Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
            return true;
    }
</script>
