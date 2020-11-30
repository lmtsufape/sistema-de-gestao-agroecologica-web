@extends('layouts.app')

@section('content')

<div class="container-main">
    <div class="row upper-div-2">
        <div class="col-md-3 img-left">

        </div>
        <div class="col-md-9">
            <br>
            <h1 class="marker">Novo canteiro de produção</h1>
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

            <div class="formulario">
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
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

    @endsection
