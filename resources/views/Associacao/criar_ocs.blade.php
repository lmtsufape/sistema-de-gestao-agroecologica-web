@extends('layouts.app2')
@section('content')


<div class="row extra-space">
  <div class="col-md-12 upper-div">
    <div class="especifies">
      <br>
      <form method="post" action="{{ route('associacao.cadastrarOcs.salvar') }}">
        @csrf
        <div class="row">
          <div class="col-md-10">
            <h1 class="marker">Criar OCS</h1>
          </div>
        </div>
          <hr class="outliner"></hr>
          @if(session()->has('Sucesso'))
          <div class="alert alert-success">
              {{ session()->get('Sucesso') }}
          </div>
          @endif
          <div class="form-row">
            <input type="hidden" id="associacao_id" name="associacao_id" value="{{$id}}">
            <div class="col-md-12 mb-3">
              <label class="label-static required">Nome</label>
              <input type="text" class="form-control input-stl" id="nome_ocs" name="nome_ocs" placeholder="Nome da OCS">
            </div>
          </div>
          <hr class="outliner"></hr>
          <div class="row">
              <div class="col-md-8 mb-3">
                  <label style="color: red" class="label-static required">Campos obrigatórios</label>
              </div>
              <div class="col-md-4 mb-3">
                  <button class="btn botao-submit bg-verde" type="submit">Cadastrar</button>
              </div>
          </div>
        </form>
      </div>

      <br>

    </form>

  </div>
</div>

@endsection
