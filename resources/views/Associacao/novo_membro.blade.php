@extends('layouts.app2')

@section('content')
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>


            <form class="formulario" method="post" action="{{ route('associacao.cadastrarMembro.salvar') }}">
              <div class="row">
                  <div class="col-md-12">
                      <h1 class="marker">Cadastrar novo membro</h1>
                  </div>
              </div>

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul style="padding: 0px;">
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              @if(session()->has('Sucesso'))
              <div class="alert alert-success">
                  {{ session()->get('Sucesso') }}
              </div>
              @endif
              <hr class="outliner"></hr>
                @csrf

                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label class="mark">Membro</label>
                  </div>
                  <div class="col-md-12 mb-3">
                    <hr class="divider"></hr>
                  </div>
                </div>


                <div class="form-row">
                    <div class="col-md-9 mb-3">
                        <label class="label-static required" for="nome">Nome</label>
                        <input type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Nome Completo">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="label-static required">OCS de origem</label>
                        <select style="height: 42px;" class="form-control input-stl" id="ocs_id" name="ocs_id">
                        <option selected disabled value="">Selecionar Estado</option>
                        @foreach($ocs as $ocs)
                            <option value="{{$ocs->id}}">{{$ocs->nome_ocs}}</option>
                        @endforeach
                        </select>
                    </div>
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
    </div>
</div>
@endsection
