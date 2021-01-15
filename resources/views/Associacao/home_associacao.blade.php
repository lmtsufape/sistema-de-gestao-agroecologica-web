@extends('layouts.app2')

@section('content')

    <div class="row extra-space">
      @extends('layouts.app')
      <script>

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
                      <div class="col-md-12">
                          <h1 class="marker">Associação</h1>
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
                      <div class="row">
                          <div class="col-md-10">
                              <h1 class="marker">Gerenciamento de OCS</h1>
                              <br>
                          </div>
                          <div class="col-md-2">
                              <button type="button" class="btn edit-bt bigger-bt bg-verde" data-toggle = "modal" data-target="#novaOcs" >Nova OCS</button>
                              <br>
                          </div>
                      </div>
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
                                <td class='nome_reuniao basic-space'>{{$ocs->nome_ocs}}</td>
                                <td class='nome_reuniao basic-space'></td>
                                <td id="coluna-images" class="basic-space" colspan="2">

                                    <a href="{{route('associacao.infoOcs', ['$id' => $ocs->id])}}"><img id="botao-editar" class="imagens-acoes" src="{{asset('images/logo_editar_reuniao.png')}}" alt=""></a>
                                </td>
                              @endforeach
                            </tbody>
                          </table>
                        </div>

                        <div id="novaOcs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                          <div class="row">
                              <div class="col-md-10">
                                  <h1 class="marker">Informações da Associação</h1>
                              </div>
                              <div class="col-md-2">
                                <button class="btn edit-bt" id="enable-bt">Editar</button>
                              </div>
                          </div>
                      <form class="formulario" method="post" action="{{ route('associacao.editarAssociacao.salvar') }}">
                          @csrf
                          <div class="form-row inner-div">
                              <label class="">Informações da Associação</label>
                          </div>
                          <div class="row">
                              <div class="col-md-4">
                                  <label class="label-static required">Nome da Associação</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="nome_entidade" name="nome" placeholder="Nome Completo" value="{{ old('nome', $associacao->nome) }}">
                              </div>
                              <div class="col-md-4">
                                  <label class="label-static required">CNPJ da associação</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="cnpj" name="cnpj" placeholder="CNPJ" value="{{ old('cnpj', $associacao->cnpj) }}">
                                  <br>
                              </div>
                              <div class="col-md-4">
                                  <label class="label-static required">Telefone</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="telefone" name="telefone" placeholder="Telefone da OCS" value="{{ old('telefone', $associacao->telefone) }}">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-4">
                                  <label class="label-static required">Email</label>
                                  <input disabled="true" class="form-control input-stl" type="email" class="form-control" id="emailemail" name="email" placeholder="Email" value="{{ old('email', $associacao->email) }}" >
                              </div>
                              <div class="col-md-4 mb-4">
                                  <label class="label-static">Celular</label>
                                  <input disabled="true" class="form-control input-stl" type="number" class="form-control" name="celular" placeholder="Celular" value="{{ old('telefone', $associacao->celular) }}">
                              </div>
                              <div class="col-md-4 mb-4">
                                  <label class="label-static">Fax</label>
                                  <input disabled="true" class="form-control input-stl" type="number" class="form-control" name="fax" placeholder="FAX" value="{{ old('telefone', $associacao->fax) }}">
                              </div>
                          </div>
                          <br>
                          <div class="form-row inner-div">
                              <label class="">Endereço da associação</label>
                          </div>
                          <div class="row">
                              <div class="col-md-4">
                                  <label class="label-static">Logradouro</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="nome_rua" name="nome_rua" placeholder="Rua onde se localiza a OCS" value="{{ old('nome_rua', $associacao->endereco->nome_rua) }}">
                              </div>
                              <div class="col-md-4">
                                  <label class="label-static">Bairro</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="bairro" name="bairro" placeholder="Bairro onde se localiza a OCS" value="{{ old('bairro', $associacao->endereco->bairro) }}">
                                  <br>
                              </div>
                              <div class="col-md-4">
                                  <label class="label-static">Nº</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="numero_casa" name="numero_casa" value="{{ old('numero_casa', $associacao->endereco->numero_casa) }}">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-4">
                                  <label class="label-static required">Cidade</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="cidade" name="cidade" value="{{ old('cidade',$associacao->endereco->cidade) }}">
                              </div>
                              <div class="col-md-4">
                                  <label class="label-static required">Estado</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="estado" name="estado" value="{{ old('estado', $associacao->endereco->estado) }}">
                                  <br>
                              </div>
                              <div class="col-md-4">
                                  <label class="label-static">CEP</label>
                                  <input disabled="true"type="text" class="form-control input-stl" id="cep" name="cep" value="{{ old('cep', $associacao->endereco->cep) }}">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <label class="label-static">Descrição</label>
                                  <textarea disabled="true"type="text" class="form-control input-stl" id="descricao" name="descricao" placeholder="Descrição de como chegar a OCS">{{ $associacao->endereco->descricao}}</textarea>
                                  <br>
                              </div>
                              <div class="col-md-12">
                                  <label class="label-static">Ponto de Referência</label>
                                  <textarea disabled="true"type="text" class="form-control input-stl" id="ponto_referencia" name="ponto_referencia">{{ $associacao->endereco->ponto_referencia}}</textarea>
                                  <br>
                              </div>
                          </div>
                          <hr class="outliner"></hr>
                          <div class="row">
                              <div class="col-md-8 mb-3">
                                  <label style="color: red" class="label-static required">Campos obrigatórios</label>
                              </div>
                              <div class="col-md-4 mb-3">
                                  <button disabled="true" class="btn botao-submit" type="submit">Finalizar Editar</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>


      @endsection

    </div>

@endsection
