@extends('layouts.app')

@section('content')

<div class="container-conteudo">
    <div class = 'jumbotron' id="jumbotron">
        <div id = 'cabecalho'>
            <label id="cabecalho-reuniao" for="botao-agendar">Reuniões</label>
            @if($usuario->tipo_perfil == "Coordenador")
                <a id="botao-agendar" type="button" class="btn btn-success" data-toggle = "modal" data-target="#agendarReuniao" href="{{route('user.coordenador.agendarReuniao')}}" >Agendar reunião</a>

                {{-- Agendar reunião modal --}}

                <div id="agendarReuniao" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div id="contentModal" class="modal-content">
                            <div class="col-md-12">
                                <h5 class="modal-title corLabelReuniao" id="titulo">Agendar reunião</h5>
                            </div>
                            <div class="col-md-12">
                                <hr id="linhaCabecalhoReuniao">
                            </div>
                            <div class="col-md-12">
                                <label id= "labelInformacoes" for="">Informações</label>
                            </div>
                            <div class="modal-body">
                                <form id="" action="{{route('user.coordenador.agendarReuniao.salvar')}}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-8 mb-4">
                                            <label class="corLabelReuniao">Nome da reunião <label class="asterisco">*</label></label>
                                            <input type="text" class="form-control" name='nome' id='nome' placeholder="Digite o nome da reunião" value="{{old('nome')}}">
                                          </div>
                                          <div class="col-md-4 mb-4">
                                            <label class="corLabelReuniao">Data da reunião <label class="asterisco">*</label></label>
                                            <input type="date" class="form-control" name="data" id="data" value="{{old('data')}}">
                                          </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-4">
                                            <label class="corLabelReuniao">Local da reunião <label class="asterisco">*</label></label>
                                            <input type="text" class="form-control" name="local" id="local" placeholder="Digite o local da reunião" value="{{old('local')}}">
                                        </div>
                                    </div>
                                    <div>
                                        <hr>
                                    </div>
                                    <div>
                                        <div class="form-row">
                                            <div id="divCamposObrigatorios" class="col-md-3 mb-4">
                                                <label class="asterisco">* <label class="fonteFooter">Campos obrigatórios</label></label>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <a id="labelCancelar" class="fonteFooter" data-dismiss="modal" href="">Cancelar</a>
                                            </div>
                                            <button id="botao-agendar-reuniao" type="submit" class="btn btn-success fonteFooter">Agendar reunião</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
