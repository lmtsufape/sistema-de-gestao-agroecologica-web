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
                  <div class="row">
                      <div class="col-md-10">
                          <h1 class="marker">Gerenciamento de OCS</h1>
                      </div>
                      <div class="col-md-2">
                          <button type="button" class="btn edit-bt bigger-bt bg-verde" data-toggle = "modal" data-target="#novaOcs" >Nova OCS</button>
                      </div>
                  </div>
                  <div class="formulario">
                      <hr class="divider"></hr>

                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul style="padding: 0px;">
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
                      @if (\Session::has('Sucesso'))
                      <div class="alert alert-success">
                        <ul>
                          <li>{!! \Session::get('Sucesso') !!}</li>
                        </ul>
                      </div>
                      @endif


                      <div class="wrp-bigger">
                      <table class="table">
                          <thead class="black white-text">
                              <tr>
                                  <th scope="col" class="nome-col"><b>Nome da OCS</b></th>
                                  <th scope="col" class="nome-col" colspan="2"><b>Ações</b></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($associacao->ocs as $ocs)
                              <tr>
                                <td class='nome_reuniao basic-space'><a class=""  id="ativarView"  data-id="{{$ocs->id}}" data-toggle = "modal" data-target="#verOcs{{$ocs->id}}">{{$ocs->nome_ocs}}</a></td>
                                <td class='nome_reuniao basic-space'></td>
                                <td id="coluna-images" class="basic-space" colspan="2">
                                  <div id="verOcs{{$ocs->id}}" class="modal fade" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                          <div id="contentModal" class="modal-content">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <h1 class="marker">Informações da OCS</h1>
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <hr id="linhaCabecalhoReuniao">
                                              </div>
                                              <label id="nome-tabela-reuniao" class = "col-md-12" for="">Informações básicas</label>
                                              <div class="form-row">
                                                  <div class="col-md-6">
                                                      <label class="label-static">Nome da OCS</label><br>
                                                      <label class="label-ntstatic">{{$ocs->nome_ocs}}</label>
                                                  </div>
                                                  <div class="col-md-6 mb-3">
                                                      <label class="label-static">Órgão fiscalizador</label><br>
                                                      <label class="label-ntstatic">{{$ocs->orgao_fiscalizador}}</label>
                                                  </div>
                                              </div>

                                              <div class="form-row">
                                                  <div class="col-md-10 mb-3">
                                                      <br>
                                                      <br>
                                                  </div>
                                                  <div class="col-md-2 mb-3">
                                                      <button type="button" class="btn edit-bt small-bt bg-verde" style="width: 200px;" data-toggle = "modal" data-target="#novoCoordenador{{$ocs->id}}" >Novo Coordenador</button>
                                                      <br>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <table class="table">
                                                      <thead>
                                                          <tr>
                                                              <th scope="col" class="nome-col">Nome do coordenador</th>
                                                              <th scope="col" class="nome-col">Função</th>
                                                              <th scope="col" class="nome-col">CPF</th>
                                                              <th scope="col" class="nome-col">Ações</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          @foreach ($ocs->produtor as $prod)
                                                            @if($prod->perfil_coordenador)
                                                            <tr>
                                                                <td class="nome_reuniao basic-space">{{$prod->nome}}</td>
                                                                <td class="nome_reuniao basic-space">{{$prod->user->tipo_perfil}}</td>
                                                                <td class="nome_reuniao basic-space">{{$prod->cpf}}</td>
                                                                <td id="coluna-images" class="basic-space">
                                                                    <a href="{{route('associacao.mudaPerfil', ['id' => $prod->user->id])}}"><img id="botao-info" class="imagens-acoes" src="{{asset('images/logo_informacoes.png')}}" alt=""></a>
                                                                </td>
                                                            </tr>
                                                            @endif
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
                                                          <label class= "cor-texto" for="">Mudar perfil</label>
                                                      </div>
                                                      <div class="div-lado">
                                                          <img id="botao-add" class="imagens-acoes" src="{{asset('images/rounded-add-button.png')}}" alt="">
                                                          <label class= "cor-texto" for=""></label>
                                                      </div>
                                                      <div class="div-lado">
                                                          <img id="botao-colher" class="imagens-acoes" src="{{asset('images/save-plant.png')}}" alt="">
                                                          <label class= "cor-texto" for=""></label>
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
                                                  <h5 class="modal-title corLabelReuniao" id="titulo">Novo Coordenador</h5>
                                              </div>
                                              <div class="col-md-12">
                                                  <hr id="linhaCabecalhoReuniao">
                                              </div>
                                              <div class="col-md-12">
                                                  <label id= "labelInformacoes" for="">Informações</label>
                                              </div>
                                              <div class="modal-body">
                                                  <form method="post" action="{{ route('associacao.cadastrarCoordenador.salvar') }}">
                                                      @csrf
                                                      <div class="form-row">
                                                          <div class="col-md-12 mb-3">
                                                              <label class="label-static required" for="nome">Nome Completo</label>
                                                              <input type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Nome Completo">
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-12 mb-3">
                                                              <label class="label-static required">CPF</label>
                                                              <input type="number" class="form-control input-stl" name="cpf" placeholder="CPF">
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-12 mb-3">
                                                              <label class="label-static required">Tipo de perfil:</label>
                                                              <select class="custom-select" id="perfil_coordenador" name="perfil_coordenador" placeholder="Perfil do coordenador">
                                                                  <option selected disabled value="">Função do coordenador</option>
                                                                  <option value="Produtor">Produtor</option>
                                                                  <option value="Tesoureiro">Tesoureiro</option>
                                                              </select>
                                                          </div>
                                                      </div>

                                                      <div class="form-row inner-div">
                                                          <label class="">Acesso ao site</label>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-12 mb-3">
                                                              <label class="label-static required" for="Email">Email</label>
                                                              <input type="email" class="form-control input-stl" id="email" name="email" placeholder="Email">
                                                          </div>
                                                          <input type="hidden" class="form-control input-stl" id="ocs_id" name="ocs_id" value="{{$ocs->id}}">
                                                      <div>
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
                                    </div>
                                  </div>

                            </tr>
                              @endforeach
                            </tbody>
                          </table>
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
                                    <div class="col-md-12">
                                        <label id= "labelInformacoes" for="">Informações</label>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('associacao.cadastrarOcs.salvar') }}">
                                            @csrf
                                            <div class="form-row">
                                                <input type="hidden" id="associacao_id" name="associacao_id" value="{{$associacao->id}}">
                                                <div class="col-md-6 mb-3">
                                                    <label class="label-static required">Nome</label>
                                                    <input type="text" class="form-control input-stl" id="nome_ocs" name="nome_ocs" placeholder="Nome da OCS">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="label-static required">Órgão fiscalizador</label>
                                                    <input type="text" class="form-control input-stl" id="orgao_fiscalizador" name="orgao_fiscalizador" placeholder="Órgão fiscalizador da OCS">
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
