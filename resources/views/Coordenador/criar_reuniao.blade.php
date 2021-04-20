@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>



            <div class="formulario">
                <form method="post" action="{{ route('user.coordenador.agendarReuniao.salvar') }}">
                  <h1 class="marker">Agendar nova reunião</h1>
                  <hr class="outliner"></hr>

                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul style="padding: 0px;">
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  <br>
                    @csrf

                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label class="mark">Informações</label>
                      </div>
                      <div class="col-md-12 mb-3">
                        <hr class="divider"></hr>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label class="label-static required">Nome da reunião</label>
                            <input type="text" class="form-control" name='nome' id='nome' placeholder="Digite o nome da reunião" value="{{old('nome')}}">
                          </div>
                          <div class="col-md-4 mb-3">
                            <label class="label-static required">Data da reunião</label>
                            <input type="date" class="form-control" name="data" id="data" value="{{old('data')}}">
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label class="label-static required">Local da reunião</label>
                            <input type="text" class="form-control" name="local" id="local" placeholder="Digite o local da reunião" value="{{old('local')}}">
                        </div>
                    </div>

                    <hr class="outliner"></hr>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label style="color: red" class="label-static required">Campos obrigatórios</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button class="btn botao-submit" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
