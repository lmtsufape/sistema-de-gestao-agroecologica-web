@extends('layouts.app')

@section('content')

<div class="upper-div">
    <h1 class="marker">Canteiro de produção localizado {{$canteiro->localizacao}}</h1>
</div>
<br>
<br>
<div class="formulario upper-div">
    <div class="form-row">
        <div class="col-md-12">
            <h2 class="marker">Informações Básicas</h2>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="col-md-12">
                <h4 class="label-static-2">Tamanho (HA)</h4>
                <h4 class="label-ntstatic-2">{{$canteiro->tamanho}}</h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h4 class="label-static-2">Localização na propriedade</h4>
                <h4 class="label-ntstatic-2">{{$canteiro->localizacao}}</h5>
            </div>
        </div>
    </div>
    @if(count($producao) > 0)
        <h3 class="marker" style="text-align: center">Produções desse canteiro:</h3>
        @foreach($producao[0]->lista_produtos() as $prd)
        <div class="upper-div">
            <div class="form-row">
                <div class="col-md-6">
                    <h4 class="label-static-2">Nome do Produto</h4>
                    <h5 class="label-ntstatic-2">{{$prd->nome}}</h5>
                    <br>
                </div>
                <div class="col-md-6">
                    <h4 class="label-static-2">Tipo do Produto</h4>
                    <h5 class="label-ntstatic-2">{{$prd->tipo}}</h5>
                    <br>
                </div>
            </div>
            @if ($prd->classe_planta)
            <div class="form-row">
                <div class="col-md-12">
                    <h4 class="label-static-2">Classe das plantas cultivadas:</h4>
                    <h5 class="label-ntstatic-2">{{$prd->classe_planta}}</h5>
                    <br>
                    <br>
                </div>
            </div>
            @endif
            @if($prd->produz_leite)
            <div class="form-row">
                <div class="col-md-12">
                    <h4 class="label-static-2">Produz leite?</h4>
                    <h5 class="label-ntstatic-2">{{$prd->produz_leite}}</h5>
                    <br>
                    <br>
                </div>
            </div>
            @endif
            @if ($prd->tratamento_residuos)
            <div class="form-row">
                <div class="col-md-12">
                    <h4 class="label-static-2">Como os residuos são tratados?</h4>
                    <h5 class="label-ntstatic-2">{{$prd->tratamento_residuos}}</h5>
                    <br>
                    <br>
                </div>
            </div>
            @endif
            @if ($prd->destino_residuos)
            <div class="form-row">
                <div class="col-md-12">
                    <h4 class="label-static-2">Destino final dos resíduos:</h4>
                    <h5 class="label-ntstatic-2">{{$prd->destino_residuos}}</h5>
                    <br>
                    <br>
                </div>
            </div>
            @endif
            @if ($prd->utilizacao_animal)
            <div class="form-row">
                <div class="col-md-12">
                    <h4 class="label-static-2">Utilização animal:</h4>
                    <h5 class="label-ntstatic-2">{{$prd->utilizacao_animal}}</h5>
                    <br>
                    <br>
                </div>
            </div>
            @endif
            <div class="form-row">
                <div class="col-md-12">
                    <h4 class="marker">Manejos:</h4>
                    <div class="col-md-12">
                        @foreach($prd->manejos() as $manj)
                            <h4 class="label-static-2">Tipo de manejo:</h4>
                            <h5 class="label-ntstatic-2">{{$manj->nome_tecnica}}</h5>
                            <br>
                            <h4 class="label-static-2">Descrição:</h4>
                            <h5 class="label-ntstatic-2">{{$manj->manejo}}</h5>
                            <br>
                            <h4 class="label-static-2">Observações:</h4>
                            <h5 class="label-ntstatic-2">{{$manj->observacoes}}</h5>
                            <br>
                            <br>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <br>
        @endforeach
        <div class="form-row">
            <div class="col-md-12">
                @if($producao[0]->lista_produtos_exteriores_beneficiado)
                    <h4 class="label-static-2">Lista de produtos exteriores</h4>
                    <h5 class="label-ntstatic-2">{{$producao[0]->lista_produtos_exteriores_beneficiado}}</h5>
                    <br>
                    <br>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <h4 class="marker">Detalhes da produção:</h4>
                <h5 class="label-ntstatic-2">{{$producao[0]->observacoes}}</h5>
                <br>
                <br>
            </div>
        </div>
    @else
    <div class="form-row">
            <div class="col-md-12 d-flex justify-content-center">
            <a href="{{route('user.canteiroProducao.producao.cadastrar', ['id_canteiro' => $canteiro->id])}}">
                <img class="imagem-menor" src="{{ asset('images/rounded-add-button.png') }}" alt="">
                <span class="marker-link">Cadastrar Producao</span>
            </a>
        </div>
    </div>
    @endif

</div>


@endsection
