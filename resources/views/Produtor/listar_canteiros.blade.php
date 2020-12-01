@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-12 upper-div extra-space">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-10">
                    <h1 class="marker">Canteiros de produção</h1>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn edit-bt bigger-bt bg-verde" data-toggle = "modal" data-target="#novoCanteiro" href="{{route('user.canteiroProducao.cadastrar')}}" >Novo canteiro de produções</button>
                </div>
            </div>
            <hr class="divider"></hr>

                {{-- Agendar reunião modal --}}

                <div id="novoCanteiro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form method="post" action="{{ route('user.canteiroProducao.salvar') }}">
                                    @csrf
                                    <div class="form-row">
                                        <input type="hidden" id="id_propriedade" name="id_propriedade" value="{{$propriedade}}">
                                        <div class="col-md-6 mb-3">
                                            <label class="label-static required">Tamanho</label>
                                            <input type="number" class="form-control input-stl" id="tamanho" name="tamanho" placeholder="Tamanho total do canteiro (metros)">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="label-static required">Localização</label>
                                            <input type="text" class="form-control input-stl" id="localizacao" name="localizacao" placeholder="Localização do canteiro na propriedade (Ex:. atrás de casa)">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-row">
                                            <div id="divCamposObrigatorios" class="col-md-3 mb-4">
                                                <label class="asterisco">* <label class="fonteFooter">Campos obrigatórios</label></label>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <a id="labelCancelar" class="fonteFooter" data-dismiss="modal" href="">Cancelar</a>
                                            </div>
                                            <button id="botao-agendar-reuniao" type="submit" class="btn btn-success fonteFooter">Cadastrar canteiro</button>
                                        </div>
                                    </div>


                                    <br>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <label id="nome-tabela-reuniao" class = "col-md-12" for="">Lista de canteiros</label>

        <div style="overflow: auto;">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="nome-col">Local</th>
                    <th scope="col" class="nome-col">Tamanho</th>
                    <th scope="col" class="nome-col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($canteiro as $cant)
                        <tr>
                            <td class='nome_reuniao basic-space'><a class="cor-texto link" href="{{route('user.canteiroProducao.ver', ['id_canteiro' => $cant->id])}}">{{$cant->localizacao}}</a></td>
                            <td class='cor-texto basic-space'>{{$cant->tamanho}}</td>
                            <td id="coluna-images" class="basic-space">
                                <img class="imagens-acoes" src="{{asset('images/logo_registrado.png')}}" alt="">
                                <img id="botao-registrar" class="imagens-acoes" src="{{asset('images/logo_historico.png')}}" alt="">
                                <img id="botao-editar" class="imagens-acoes" src="{{asset('images/logo_editar_reuniao.png')}}" alt="">
                                <img id="botao-cancelar" class="imagens-acoes" src="{{asset('images/logo_deletar_reuniao.png')}}" alt="">
                        </td>
                        </tr></a>
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
                <img class="imagens-acoes" src="{{asset('images/logo_registrado.png')}}" alt="">
                <label class= "cor-texto" for="">Cadastrar produção</label>
            </div>
            <div class="div-lado">
                <img id="botao-registrar" class="imagens-acoes" src="{{asset('images/logo_historico.png')}}" alt="">
                <label class= "cor-texto" for="">Histórico do canteiro</label>
            </div>
            <div class="div-lado">
                <img id="botao-editar" class="imagens-acoes" src="{{asset('images/logo_editar_reuniao.png')}}" alt="">
                <label class= "cor-texto" for="">Editar canteiro</label>
            </div>
            <div class="div-lado">
                <img id="botao-cancelar" class="imagens-acoes" src="{{asset('images/logo_deletar_reuniao.png')}}" alt="">
                <label class= "cor-texto" for="">Deletar canteiro</label>
            </div>
        </div>
    </div>
</div>

@endsection
