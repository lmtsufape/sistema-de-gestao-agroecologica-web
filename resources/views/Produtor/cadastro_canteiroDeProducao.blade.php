@extends('layouts.app')

@section('content')

<div class="container-main">
    <div class="upper-div">
        <h1 class="titles">Novo canteiro de produção</h1>
    </div>
    <br>
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

    <div class="formulario upper-div">
    <form method="post" action="{{ route('user.canteiroProducao.salvar') }}">
        @csrf
        <div class="form-row">
            <input type="hidden" id="id_propriedade" name="id_propriedade" value="{{$propriedade}}">
            <div class="col-md-6 mb-3">
                <label class="label-static">Tamanho</label>
                <input type="number" class="form-control input-stl" id="tamanho" name="tamanho" placeholder="Tamanho total do canteiro (metros)">
            </div>
            <div class="col-md-6 mb-3">
                <label class="label-static">Localização</label>
                <input type="text" class="form-control input-stl" id="localizacao" name="localizacao" placeholder="Localização do canteiro na propriedade (Ex:. atrás de casa)">
            </div>
        </div>

        <button class="btn botao-submit" type="submit">Cadastrar</button>
    </form>
    </div>
</div>


@endsection
