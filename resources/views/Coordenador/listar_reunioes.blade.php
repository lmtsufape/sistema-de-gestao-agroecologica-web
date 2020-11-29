@extends('layouts.app')

@section('content')

<div class="container-conteudo">
    <div class = 'jumbotron' id="jumbotron">
        <div id = 'cabecalho'>
            <label id="cabecalho-reuniao" for="botao-agendar">Reuniões</label>
            @if($usuario->tipo_perfil == "Coordenador")
            <a id="botao-agendar" type="button" class="btn btn-success" href="{{route('user.coordenador.agendarReuniao')}}" >Agendar reunião</a>
        @endif
        </div>
    
        <hr class="linha-cabecalho">
        <label id="nome-tabela-reuniao" class = "col-md-12" for="">Reuniões Agendadas</label>

        <div style="overflow: auto;">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="nome-col">Nome da reunião</th>
                    <th scope="col" class="nome-col">Data</th>
                    <th scope="col" class="nome-col">Status</th>
                    <th scope="col" class="nome-col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($reunioes_agendadas as $reuniao_agendada)
                        <tr class='reuniao'>
                            <td class='nome_reuniao'><a class="cor-texto" href="{{route('user.coordenador.verReuniao', ['id_reuniao' => $reuniao_agendada->id])}}">{{$reuniao_agendada->nome}}</a></td>
                            <td class='data_reunião cor-texto'>{{$reuniao_agendada->data}}</td>
                            <td>
                                @if($reuniao_agendada->registrada == false)
                                    <img class="imagem-registro" src="{{asset('images/logo_nao_registrad.png')}}" alt="">
                                    <font color="#FF0000">Não registrada</font>
                                @else
                                    <img class="imagem-registro" src="{{asset('images/logo_registrado.png')}}" alt="">
                                    <font color="#2BC855">Registrada</font>
                                @endif
                            </td>
                            <td id="coluna-images">
                                <img id="botao-registrar" class="imagens-acoes" src="{{asset('images/logo_registrar_reuniao.png')}}" alt="">
                                <img id="botao-editar" class="imagens-acoes" src="{{asset('images/logo_editar_reuniao.png')}}" alt="">
                                <img id="botao-cancelar" class="imagens-acoes" src="{{asset('images/logo_deletar_reuniao.png')}}" alt="">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <div id="linha-legenda"><hr></div>
            <div>
                <label class= "cor-texto" for="">Legenda:</label>
            </div>
            <div class="div-lado">
                <img id="botao-registrar" class="imagens-acoes" src="{{asset('images/logo_registrar_reuniao.png')}}" alt="">
                <label class= "cor-texto" for="">Registrar reunião</label>
            </div>
            <div class="div-lado">
                <img id="botao-editar" class="imagens-acoes" src="{{asset('images/logo_editar_reuniao.png')}}" alt="">
                <label class= "cor-texto" for="">Editar reunião</label>
            </div>
            <div class="div-lado">
                <img id="botao-cancelar" class="imagens-acoes" src="{{asset('images/logo_deletar_reuniao.png')}}" alt="">
                <label class= "cor-texto" for="">Cancelar reunião</label>
            </div>
        </div>
    </div>
</div>

@endsection