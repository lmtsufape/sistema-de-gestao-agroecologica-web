@extends('layouts.app')

@section('content')

<h2>Canteiro de produção localizado {{$canteiro->localizacao}}</h2>
<div class="formulario">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="col-md-12">
                <h4>Tamanho</h4>
                <label>{{$canteiro->tamanho}}</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h4>Localização na propriedade</h4>
                <label>{{$canteiro->localizacao}}</label>
            </div>
        </div>
    </div>
<h3 style="text-align: center">Produções desse canteiro:</h3>

</div>


@endsection
