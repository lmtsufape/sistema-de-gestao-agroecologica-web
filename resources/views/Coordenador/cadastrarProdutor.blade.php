@extends('layouts.app')

@section('content')
    <h2>CADASTRO DO PRODUTOR</h2>
    <form action="">
        @csrf
        <div class="input-block">
            <label for="nome">Nome Completo</label>
            <input type="text" placeholder="Nome Completo">
        </div>
        
        <div class="input-block">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" placeholder="Data de Nascimento">
        </div>

        <div class="input-block">
            <label for="rg">RG</label>
            <input type="number" placeholder="RG">
        </div>

        <div class="input-block">
            <label for="cpf">CPF</label>
            <input type="number" placeholder="CPF">
        </div>

        <div class="input-block">
            <label for="nome_conjuge">Nome Cônjuge</label>
            <input type="text" placeholder="Nome do Cônjuge">
        </div>

        <div class="input-block">
            <label for="cpf_conjuge">Nome Completo</label>
            <input type="number" placeholder="CPF do Cônjuge">
        </div>

        <div class="input-block">
            <label for="nascimento_conjuge">Data de Nascimento</label>
            <input type="date" placeholder="Data de Nascimento do Cônjuge">
        </div>

        <div class="input-block">
            <label for="nascimento_conjuge">Data de Nascimento</label>
            <input type="date" placeholder="Data de Nascimento do Cônjuge">
        </div>

        <div class="input-block">
            <label for="nomes-filhos">Nome dos Filhos</label>
            <input type="textfield" placeholder="Nome Dos Filhos"><br>
        </div>

        <input type="submit">
        
    </form>
@endsection