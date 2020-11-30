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
        <div class="col-md-12 d-flex justify-content-center">
            <button class="bt-canteiro">
                <a href="">
                    <img class="imagem-menor" src="{{ asset('images/clock.png') }}" alt="">
                    <span style="color: #3CB371">Histórico do Canteiro</span>
                </a>
            </button>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="col-md-12">
                <h4 class="label-static-2">Tamanho (Metros)</h4>
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
            @foreach($producao as $prod)
            <div class="upper-div">
                @foreach($prod->lista_produtos() as $prd)
                <div class="form-row">
                    <div class="col-md-4">
                        <h4 class="label-static-2">Nome do produto</h4>
                        <h5 class="label-ntstatic-2">{{$prd->nome}}</h5>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <h4 class="label-static-2">Inicio da produção</h4>
                        <h5 class="label-ntstatic-2">{{$prod->dataInicioFormatada()}}</h5>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <h4 class="label-static-2">Tipo do produto</h4>
                        <h5 class="label-ntstatic-2">{{$prd->tipo}}</h5>
                        <br>
                    </div>
                </div>
                @if($prd->classe_planta)
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
                        <h5 class="label-ntstatic-2">
                            @if($prd->produz_leite == 1)
                            Sim
                            @else
                            Não
                            @endif
                        </h5>
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
                        <h4 class="label-static-2">Manejos diários:</h4>
                        <div class="col-md-12">
                            @foreach($prd->manejos() as $manj)
                            <h5 class="label-ntstatic-2">{{$manj->nome_tecnica}}</h5>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="form-row">
                    <div class="col-md-12">
                        @if($prod->lista_produtos_exteriores_beneficiado)
                        <h4 class="label-static-2">Lista de produtos exteriores</h4>
                        <h5 class="label-ntstatic-2">{{$prod->lista_produtos_exteriores_beneficiado}}</h5>
                        <br>
                        <br>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <h4 class="label-static-2">Detalhes da produção:</h4>
                        <h5 class="label-ntstatic-2">{{$prod->observacoes}}</h5>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <button class="bt-canteiro">
                            <a href="">
                                <img class="imagem-menor" src="{{ asset('images/clock.png') }}" alt="">
                                <span style="color: #3CB371">Histórico da Produção</span>
                            </a>
                        </button>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <br>
            @endforeach
            @endif
        </div>


        @endsection
