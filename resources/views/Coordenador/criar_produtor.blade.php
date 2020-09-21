@extends('layouts.app')

@section('content')
    <h2>CADASTRO DO PRODUTOR</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="padding: 0px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="formulario">
        <form method="post" action="{{ route('user.coordenador.cadastrarProdutor.salvar') }}">
            @csrf
            <div class="agrupar">
                <div class="input-block">
                    <input type="text" placeholder="Nome Completo" name="nome" id="nome">
                </div>

                <div class="input-block">
                    <input type="email" placeholder="Email" name="email" id="email">
                </div>
            </div>

            <div class="grupo-informacoes">
                <div class="input-block">
                    <input type="password" placeholder="Senha" name="password" id="password">
                </div>

                <div class="input-block">
                    <input type="password" placeholder="Confirmar Senha" name="password" id="password">
                </div>
            </div>


            <div class="grupo-informacoes">
                <div class="input-block">
                    <input type="text" placeholder="Data de Nascimento" name="data_nascimento" id="data_nascimento" data-mask="00/00/0000">
                    </input>
                </div>
                <div class="input-block">
                    <input type="number" placeholder="RG" name="rg" id="rg">
                </div>
                <div class="input-block">
                    <input type="number" placeholder="CPF" name="cpf" id="cpf">
                </div>
            </div>

            <div class="grupo-informacoes">
                <div class="input-block">
                    <input type="text" placeholder="Nome do Cônjuge" name="nome_conjuge" id="nome_conjuge">
                </div>
                <div class="input-block">
                    <input type="number" placeholder="Telefone" name="telefone" id="telefone">
                </div>
            </div>
            

            <div class="input-block">
                <input type="textarea" placeholder="Nome Dos Filhos" name="nomes-filhos" id="nomes-filhos">
            </div>

            <div class="grupo-informacoes">
                 <div class="input-block">
                    <input type="text" placeholder="Rua" name="nome_rua" id="nome_rua">
                </div>
                <div class="input-block">
                    <input type="number" placeholder="Numero da casa" name="numero_casa" id="numero_casa">
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
    </div>


@endsection
