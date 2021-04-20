@extends('layouts.app2')
@section('content')


      <script>
      $(document).on("click", "#ativarView", function () {
          var myBookId = $(this).data('id');
          $(".modal-body #bookId").val( myBookId );
          // As pointed out in comments,
          // it is unnecessary to have to manually call the modal.
          // $('#addBookDialog').modal('show');
      });

      function toggleFormElements() {
          var inputs = document.getElementsByTagName("input");
          for (var i = 0; i < inputs.length; i++) {
              inputs[i].disabled = false;
          }

          var inputs = document.getElementsByTagName("input");
          for (var i = 0; i < inputs.length; i++) {
              if(inputs[i].type === "text"){
                  inputs[i].disabled = false;
              }
              if(inputs[i].type === "date"){
                  inputs[i].disabled = false;
              }
              if(inputs[i].type === "number"){
                  inputs[i].disabled = false;
              }
              if(inputs[i].type === "tel"){
                  inputs[i].disabled = false;
              }
              if(inputs[i].type === "email"){
                  inputs[i].disabled = false;
              }
          }
          var selects = document.getElementsByTagName("select");
          for (var i = 0; i < selects.length; i++) {
              selects[i].disabled = false;
          }
          var textareas = document.getElementsByTagName("textarea");
          for (var i = 0; i < textareas.length; i++) {
              textareas[i].disabled = false;
          }
          var buttons = document.getElementsByTagName("button");
          for (var i = 0; i < buttons.length; i++) {
              buttons[i].disabled = false;
          }
      }

      document.addEventListener('DOMContentLoaded', function () {
          document.getElementById("enable-bt").addEventListener('click', toggleFormElements, false);
      });


      </script>

      @section('content')

      <div class="row extra-space">
          <div class="col-md-12 upper-div">
              <div class="especifies">
                  <br>

                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul style="padding: 0px;">
                          @foreach ($errors->all() as $error)
                          <li style="color: black;">{{!! $error !!}}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  @if (\Session::has('Sucesso'))
                  <div class="alert alert-success">
                    <ul>
                      <li style="color: black;">{!! \Session::get('Sucesso') !!}</li>
                    </ul>
                  </div>
                  @endif

                  <div class="formulario">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="marker">Listagem de OCS</h1>
                        </div>
                        <div class="col-md-2">
                            <button style="margin-left: -117px;" type="button" class="btn edit-bt bigger-bt bg-verde" data-toggle = "modal" data-target="#novaOcs" >Nova OCS</button>
                        </div>
                    </div>
                    <hr class="outliner"></hr>
                      <div class="wrp-bigger">
                      <table class="table">
                          <thead class="black white-text">
                              <tr>
                                  <th scope="col" class="nome-col"><b>Nome da OCS</b></th>
                                  <th scope="col" class="nome-col" colspan="4"><b>Ações</b></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($associacao->ocs as $ocs)
                              <tr>
                                <td class='nome_reuniao basic-space'>{{$ocs->nome_ocs}}</td>
                                <td id="coluna-images" class="basic-space">
                                    <a id="ativarView"  data-id="{{$ocs->id}}" data-toggle = "modal" data-target="#verOcs{{$ocs->id}}"><img id="botao-info" class="imagens-acoes" src="{{asset('images/logo_informacoes.png')}}" alt=""></a>
                                    <a href="{{route('associacao.infoOcs', ['id' => $ocs->id])}}"><img id="botao-editar" class="imagens-acoes" src="{{asset('images/logo_editar_reuniao.png')}}" alt=""></a>
                                    <a id="ativarView"  data-id="{{$ocs->id}}" data-toggle = "modal" data-target="#deletarOcs{{$ocs->id}}"><img id="botao-del" class="imagens-acoes" src="{{asset('images/logo_nao_registrad.png')}}" alt=""></a>
                                </td>
                                <td id="coluna-images" class="basic-space" colspan="2">
                                  <div id="verOcs{{$ocs->id}}" class="modal fade" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                          <div id="contentModal" class="modal-content">
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10">

                                                    <h1 class="marker">Gestão da OCS</h1>
                                                </div>
                                                <div class="col-md-2 mb-3">
                                                    <button id="novoCoord" type="button" class="btn edit-bt small-bt bg-verde" style="width: 200px;" data-toggle = "modal" data-target="#novoCoordenador{{$ocs->id}}" >Novo membro</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-12">
                                                  <hr class="outliner"></hr>
                                              </div>
                                            </div>
                                              <div class="form-row">
                                                  <table class="table">
                                                      <thead>
                                                          <tr>
                                                              <th scope="col" class="nome-col">Nome do membro</th>
                                                              <th scope="col" class="nome-col">Perfil</th>
                                                              <th scope="col" class="nome-col">CPF</th>
                                                              <th scope="col" class="nome-col">Ações</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          @foreach ($ocs->produtor as $prod)
                                                            <tr>
                                                                <td class="nome_reuniao basic-space">{{$prod->user->nome}}</td>
                                                                <td class="nome_reuniao basic-space">{{$prod->user->tipo_perfil}}</td>
                                                                <td class="nome_reuniao basic-space">{{$prod->user->email}}</td>
                                                                <td id="coluna-images" class="basic-space">
                                                                    <a href="{{route('associacao.mudaPerfil', ['id' => $prod->user->id])}}"><img id="botao-info" class="imagens-acoes bg-verde" src="{{asset('images/logo_presente.png')}}" alt=""></a>
                                                                </td>
                                                            </tr>
                                                          @endforeach
                                                      </tbody>
                                                  </table>
                                              </div>
                                              <div class="form-row">
                                                  <div class="col-md-12 mb-3">
                                                      <div id="linha-legenda"><hr></div>
                                                      <div>
                                                          <label class= "cor-texto" for="">Legenda:</label>
                                                      </div>
                                                      <div class="div-lado">
                                                          <img id="botao-info" class="imagens-acoes bg-verde" src="{{asset('images/logo_presente.png')}}" alt="">
                                                          <label class= "cor-texto" for="">Mudar perfil</label>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="col-md-11 mb-3">

                                                  </div>
                                                  <div class="col-md-1 mb-3">
                                                      <a class="btn small-bt bg-cinza" data-dismiss="modal" href="">Voltar</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div></td>
                                  <div id="novoCoordenador{{$ocs->id}}" style="z-index: 9999;" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                          <div id="contentModal" class="modal-content">
                                              <div class="col-md-12">
                                                  <h5 class="modal-title corLabelReuniao marker" id="titulo">Novo membro da OCS</h5>
                                              </div>

                                              <div class="modal-body">
                                                  <form method="post" action="{{ route('associacao.cadastrarMembro.salvar') }}">
                                                    <hr class="outliner"></hr>
                                                      @csrf
                                                      <label class="mark">Membro</label>
                                                      <div class="form-row">
                                                          <div class="col-md-12 mb-3">
                                                              <label class="label-static required" for="nome">Nome</label>
                                                              <input type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Nome Completo">
                                                          </div>
                                                          <input type="hidden" name="ocs_id" value="{{$ocs->id}}">
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-12 mb-3">
                                                              <label class="label-static required">CPF</label>
                                                              <input type="number" class="form-control input-stl" name="email" placeholder="CPF apenas números">
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                        <div class="col-md-12 mb-3">
                                                            <label class="label-static required">Tipo de perfil</label>
                                                            <select style="height: 42px;" class="form-control input-stl" id="tipo_perfil" name="tipo_perfil">
                                                            <option selected disabled value="">Selecionar Perfil</option>
                                                            <option value="Produtor">Produtor</option>
                                                            <option value="Coordenador">Coordenador</option>
                                                            </select>
                                                        </div>
                                                      </div>
                                                      <hr class="outliner"></hr>
                                                          <div class="form-row">
                                                              <div id="divCamposObrigatorios" class="col-md-3 mb-4">
                                                                  <label class="asterisco">* <label class="fonteFooter">Campos obrigatórios</label></label>
                                                              </div>
                                                              <div class="col-md-3 mb-4">
                                                                  <a id="labelCancelar" class="fonteFooter" data-dismiss="modal" href="">Cancelar</a>
                                                              </div>
                                                              <button id="botao-agendar-reuniao" type="submit" class="btn btn-success fonteFooter">Cadastrar coordenador</button>
                                                          </div>
                                                      </div>


                                                      <br>
                                                      <br>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                      <td id="coluna-images" class="basic-space">
                                        <div id="deletarOcs{{$ocs->id}}" class="modal fade" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                            <div id="contentModal" class="modal-content">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h1 class="marker">Remover OCS</h1>
                                                </div>
                                              </div>
                                              <div class="modal-body">
                                              <hr class="outliner"></hr>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h2 class="label-static">Tem certeza que deseja apagar a OCS?</h2>
                                                </div>

                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <center><h3 class="label-static">Isso apagará todos os seus membros também, não há volta!</h3>
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                  <a style="background: red" class="btn botao-submit" href="{{route('associacao.removerOcs.salvar', ['id' => $ocs->id])}}">Sim</a>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                  <a class="btn botao-submit bg-verde" data-dismiss="modal" href="">Não</a>
                                                </div>
                                              </div>
                                              <hr class="outliner"></hr>
                                            </div>
                                            </div>
                                          </div>
                                        </div></td>
                                    </div>
                                  </div>

                            </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div id="linha-legenda"><hr></div>
                                <div>
                                    <label class= "cor-texto" for="">Legenda:</label>
                                </div>
                                <div class="div-lado">
                                    <img id="botao-info" class="imagens-acoes" src="{{asset('images/logo_informacoes.png')}}" alt="">
                                    <label class= "cor-texto" for="">Informações da OCS</label>
                                </div>
                                <div class="div-lado">
                                    <img id="botao-editar" class="imagens-acoes" src="{{asset('images/logo_editar_reuniao.png')}}" alt="">
                                    <label class= "cor-texto" for="">Editar OCS</label>
                                </div>
                                <div class="div-lado">
                                    <img id="botao-del" class="imagens-acoes" src="{{asset('images/logo_nao_registrad.png')}}" alt="">
                                    <label class= "cor-texto" for="">Deletar OCS</label>
                                </div>


                            </div>
                        </div>

                        <div id="novaOcs" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div id="contentModal" class="modal-content">
                                    <div class="col-md-12">
                                        <h5 class="modal-title corLabelReuniao" id="titulo">Nova OCS</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <hr id="linhaCabecalhoReuniao">
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('associacao.cadastrarOcs.salvar') }}">
                                            @csrf
                                            <div class="form-row">
                                                <input type="hidden" id="associacao_id" name="associacao_id" value="{{$associacao->id}}">
                                                <div class="col-md-12 mb-3">
                                                    <label class="label-static required">Nome</label>
                                                    <input type="text" class="form-control input-stl" id="nome_ocs" name="nome_ocs" placeholder="Nome da OCS">
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
                                                    <button id="botao-agendar-reuniao" type="submit" class="btn btn-success fonteFooter">Cadastrar OCS</button>
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
              </div>
          </div>
      </div>


@endsection
