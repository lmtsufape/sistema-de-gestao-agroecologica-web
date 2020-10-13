@extends('layouts.app')

@section('content')

<h2>Novo canteiro de produção</h2>

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
<form method="post" action="{{ route('user.canteiroProducao.salvar') }}">
    @csrf
    <div class="form-row">
        <input type="hidden" id="id_propriedade" name="id_propriedade" value="{{$propriedade}}">
        <div class="col-md-6 mb-3">
            <label>Tamanho</label>
            <input type="text" class="form-control" id="tamanho" name="tamanho" placeholder="Tamanho total do canteiro (metros)">
        </div>
        <div class="col-md-6 mb-3">
            <label>Localização</label>
            <input type="text" class="form-control" id="localizacao" name="localizacao" placeholder="Localização do canteiro na propriedade (Ex:. atrás de casa)">
        </div>
    </div>

    <button class="btn botao-submit" type="submit">Cadastrar</button>
</form>
</div>


@endsection
