@extends('layouts.app')

@section('content')

<h2>CADASTRO DA PROPRIEDADE</h2>

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
<form method="post" action="{{ route('user.salvarCadastrarPropriedade') }}">
    @csrf
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label>Tamanho total</label>
            <input type="text" class="form-control" id="tamanho_total" name="tamanho_total" placeholder="Tamanho total da propriedade (Metros ou Hectares)">
        </div>
        <div class="col-md-6 mb-3">
            <label>Fonte de Água</label>
            <input type="text" class="form-control" id="fonte_de_agua" name="fonte_de_agua" placeholder="Fonte de água utilizada na propriedade">
        </div>
    </div>

    <button class="btn botao-submit" type="submit">Cadastrar</button>
</form>
</div>


@endsection
