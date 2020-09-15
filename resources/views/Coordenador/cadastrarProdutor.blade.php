@extends('layouts.app')

@section('content')
    <h2>CADASTRO DO PRODUTOR</h2>
    <form action="">
        @csrf
        <div class="input-block">
            <label for="nome">Nome Completo</label>
            <input type="text" placeholder="Nome Completo" name="nome">
        </div>
        
        <div class="input-block">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" placeholder="Data de Nascimento" name="data_nascimento">
        </div>

        <div class="input-block">
            <label for="rg">RG</label>
            <input type="number" placeholder="RG" name="rg">
        </div>

        <div class="input-block">
            <label for="cpf">CPF</label>
            <input type="number" placeholder="CPF" name="cpf">
        </div>

        <div class="input-block">
            <label for="nome_conjuge">Nome Cônjuge</label>
            <input type="text" placeholder="Nome do Cônjuge" name="nome_conjuge">
        </div>

        <div class="input-block">
            <label for="cpf_conjuge">CPF do Conjuge</label>
            <input type="number" placeholder="CPF do Cônjuge" name="cpf_conjuge">
        </div>

        <div class="input-block">
            <label for="nascimento_conjuge">Data de Nascimento</label>
            <input type="date" placeholder="Data de Nascimento do Cônjuge" name="">
        </div>

        <div class="input-block">
            <label for="nomes-filhos">Nome dos Filhos</label>
            <input type="text" placeholder="Nome Dos Filhos" name="nomes-filhos">
        </div>

       <div class="input-block">
           <label for="Rua">Rua</label>
           <input type="text" placeholder="Rua" name=nome_rua>
       </div>

       <div class="input-block">
           <label for="numero_casa">Rua</label>
           <input type="number" placeholder="Rua" name=numero_casa>
       </div>

       <div class="input-block">
           <label for="Bairro">Bairro</label>
           <input type="text" placeholder="Bairro" name=bairro>
       </div>

       <div class="input-block">
           <label for="cidade">Cidade</label>
           <input type="text" placeholder="cidade" name="cidade">
       </div>

       <div class="input-block">
           <label for="cep">CEP</label>
           <input type="number" placeholder="cep" name="cep">
       </div>

       <div class="input-block">
           <label for="descricao">Estado</label>
           <input type="text" placeholder="descricao" name="descricao">
       </div>

       <div class="input-block">
           <label for="ponto_referencia">Estado</label>
           <input type="text" placeholder="estado" name="ponto_referencia">
       </div>

       <div class="botao">
           <input type="submit">
        </div>
        
        
    </form>
@endsection