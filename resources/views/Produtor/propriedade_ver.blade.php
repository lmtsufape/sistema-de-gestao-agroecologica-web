@extends('layouts.app')

@section('content')

<h2>Informações sobre a propriedade</h2>
<div class="formulario">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <h4>Tamanho total</h4>
            <label>{{$propriedade->tamanho_total}}</label>
        </div>
        <div class="col-md-6 mb-3">
            <div class="col-md-6 mb-3">
                <h4>Fonte de água</h4>
                <label>{{$propriedade->fonte_de_agua}}</label>
            </div>
        </div>
    </div>
<h3 style="text-align: center">Canteiros de Produção:</h3>
    <div class="row">
        @iF(count($canteiros) > 0)
            @foreach($canteiros as $cant)
            <div class="col-md-12 d-flex justify-content-center">
                <a href="{{route('user.canteiroProducao.ver', ['id_canteiro' => $cant->id])}}">
                    <img class="imagem-menor" src="{{ asset('images/agriculture.png') }}" alt="">
                    <span>{{$cant->localizacao}}</span>
                </a>
                <br>
                <br>
            </div>
            @endforeach
         @endif
         <br>
        <div class="col-md-12 d-flex justify-content-center">
             <a href="{{route('user.canteiroProducao.cadastrar')}}">
                <img class="imagem-menor" src="{{ asset('images/rounded-add-button.png') }}" alt="">
                <span>Cadastrar canteiro de produção</span>
             </a>
        </div>
    </div>
</div>


@endsection
