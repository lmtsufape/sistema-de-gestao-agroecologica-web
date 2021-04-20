@extends('layouts.app2')
@section('content')


<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <form class="formulario" method="post" action="{{ route('associacao.alterarSenha.salvar') }}">
            @csrf
            <div class="row">
                <div class="col-md-10">
                    <h1 class="marker">Alterar senha de acesso</h1>
                </div>
            </div>
            <hr class="outliner"></hr>

            <br>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label class="label-static required" for="senha">Nova senha</label>
                    <input  type="password" class="form-control input-stl" id="senha" name="password">
                </div>
                <div class="col-md-6 mb-3 ">
                    <label class="label-static required" for="confirmar senha">Confirmar nova senha</label>
                    <input  type="password" class="form-control input-stl" id="senha" name="password">
                </div>
            </div>
            <hr class="outliner"></hr>
            <div class="row">
              <div class="col-md-8 mb-3">
                <label style="color: red" class="label-static required">Campos obrigatórios</label>
              </div>
              <div class="col-md-4 mb-3">
                <button class="btn botao-submit bg-verde" type="submit">Atualizar</button>
              </div>
            </div>
            </form>

    </div>
  </div>
</div>

@endsection
