@extends('layouts.app')

@section('content')
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Detalhes da produção</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <img id="botao-add" class="imagens-acoes" src="{{asset('images/rounded-add-button.png')}}" alt="">
                    <img id="botao-colher" class="imagens-acoes" src="{{asset('images/save-plant.png')}}" alt="">
                </div>
            </div>
            <hr class="divider"></hr>



            <div class="inner-div">
                <label class="">Produção</label><br>
            </div>
            <div class="form-row">
                <div class="col-md-8">
                    <label class="label-static">Tipo de produção</label><br>
                    <label class="label-ntstatic">{{$producao->tipo_producao}}</label>
                    <br>
                </div>
                <div class="col-md-4">
                    <label class="label-static">Inicio da produção</label><br>
                    <label class="label-ntstatic">{{$producao->dataInicioFormatada()}}</label>
                    <br>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label class="label-static">Observações adicionais</label><br>
                    <label class="label-ntstatic">{{$producao->observacoes}}</label>
                    <br>
                </div>
            </div>

            <div class="inner-div">
                <label class="">Produtos</label><br>
            </div>
            @foreach($producao->lista_produtos() as $prd)
            <hr class="divider"></hr>
            <div class="form-row">
                <div class="col-md-8">
                    <label class="label-static">Nome do produto</label><br>
                    <label class="label-ntstatic">{{$prd->nome}}</label>
                </div>

                <div class="col-md-4">
                    <label class="label-static">Tipo do produto</label><br>
                    <label class="label-ntstatic">{{$prd->tipo}}</label>
                </div>
            </div>
            @if($prd->classe_planta)
            <div class="form-row">
                <div class="col-md-12">
                    <label class="label-static">Classe das plantas cultivadas:</label><br>
                    <label class="label-ntstatic">{{$prd->classe_planta}}</label>
                    <br>
                </div>
            </div>
            @endif

            <div class="form-row">
                @if($prd->produz_leite)
                <div class="col-md-8">
                    <label class="label-static">Produz leite?</label><br>
                    <label class="label-ntstatic">
                        @if($prd->produz_leite == 1)
                        Sim
                        @else
                        Não
                        @endif
                    </label><br>
                    <br>
                </div>
                @endif
                @if ($prd->utilizacao_animal)
                <div class="col-md-4">
                    <label class="label-static">Utilização animal:</label><br>
                    <label class="label-ntstatic">{{$prd->utilizacao_animal}}</label>
                    <br>
                </div>
                @endif
            </div>
            @if ($prd->tratamento_residuos)
            <div class="form-row">
                <div class="col-md-12">
                    <label class="label-static">Como os residuos são tratados?</label><br>
                    <label class="label-ntstatic">{{$prd->tratamento_residuos}}</label>
                    <br>
                </div>
            </div>
            @endif
            @if ($prd->destino_residuos)
            <div class="form-row">
                <div class="col-md-12">
                    <label class="label-static">Destino final dos resíduos:</label><br>
                    <label class="label-ntstatic">{{$prd->destino_residuos}}</label>
                    <br>
                </div>
            </div>
            @endif
            <div class="form-row">
                <div class="col-md-12">
                    <label class="label-static">Manejos diários:</label><br>
                    @foreach($prd->manejos() as $manj)
                    <label class="label-ntstatic">{{$manj->nome_tecnica}}</label>
                    <br>
                    @endforeach
                </div>
            </div>
            <br>
            <br>
            @endforeach
            <hr class="outliner"></hr>
            <div>
                <label class= "cor-texto" for="">Legenda:</label>
            </div>
            <div class="div-lado">
                <img id="botao-add" class="imagens-acoes" src="{{asset('images/rounded-add-button.png')}}" alt="">
                <label class= "cor-texto" for="">Registrar manejo</label>
            </div>
            <div class="div-lado">
                <img id="botao-colher" class="imagens-acoes" src="{{asset('images/save-plant.png')}}" alt="">
                <label class= "cor-texto" for="">Colher produção</label>
            </div>

        </div>
    </div>
</div>



@endsection
