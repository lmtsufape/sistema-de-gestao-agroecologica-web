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

      <div class="formulario">
        <div class="row">
          <div class="col-md-10">
            <h1 class="marker">Editar OCS</h1>
          </div>
        </div>
        <hr class="outliner"></hr>
        @if (\Session::has('Sucesso'))
        <div class="alert alert-success">
          <ul>
            <li>{!! \Session::get('Sucesso') !!}</li>
          </ul>
        </div>
        @endif
        <label class="mark">Selecione uma OCS</label>
        <br>
        <br>

        <div class="wrp-bigger">
          <table class="table">
            <thead class="black white-text">
              <tr>
                <th scope="col" class="nome-col" colspan="2"><b>Nome da OCS</b></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ocs as $ocs)
              <tr>
                <td class='nome_reuniao basic-space'><a id="ativarView"  data-id="{{$ocs->id}}" data-toggle = "modal" data-target="#verOcs{{$ocs->id}}">{{$ocs->nome_ocs}}</a></td>
                <td id="coluna-images" class="basic-space">
                  <div id="verOcs{{$ocs->id}}" class="modal fade" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>


        </div>
      </div>
    </div>
  </div>


  @endsection
