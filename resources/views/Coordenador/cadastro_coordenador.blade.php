@extends("layouts.app")

@section("content")
<div class="container-main">
    <div class="row upper-div-2">
        <div class="col-md-3 img-left">

        </div>
        <div class="col-md-9">
            <br>

            <h1 class="marker">Cadastro do Coordenador da OCS</h1>
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
    <form class="formulario" method="post" action="{{ route('user.coordenador.cadastrarCoordenador.salvar') }}">
        @csrf
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
            </div>
            <div class="col-md-6 mb-3">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="password" placeholder="Senha">
            </div>
            <div class="col-md-6 mb-3">
                <label for="confirmar senha">Confirmar Senha</label>
                <input type="password" class="form-control" id="senha" name="password" placeholder="Senha">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-4">
                <label for="data de nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento">
            </div>
            <div class="col-md-4 mb-4">
                <label>RG</label>
                <input type="number" class="form-control" name="rg" placeholder="RG">
            </div>
            <div class="col-md-4 mb-4">
                <label>CPF</label>
                <input type="number" class="form-control" name="cpf" placeholder="CPF">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-7 mb-3">
                <label>Nome do Conjuge</label>
                <input type="text" class="form-control" id="nome_conjuge" name="nome_conjuge" placeholder="Nome do Conjuge">
            </div>
            <div class="col-md-5 mb-3">
                <label>Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
            </div>
        </div>

        <div class="form-group">
            <label>Nome dos Filhos</label>
            <textarea class="form-control" id="nome-filhos" name="nome-filhos" placeholder="Nome dos Filhos" rows="2"></textarea>
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
</div>
</div>
</div>
</div>
@endsection
