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
</div>


@endsection
