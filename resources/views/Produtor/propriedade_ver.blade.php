@extends('layouts.app')

@section('content')

<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>



            <div class="formulario">
                <form method="" action="">
                  <div class="row">
                      <div class="col-md-10">
                          <h1 class="marker">Informações da propriedade</h1>
                      </div>
                  </div>
                  @if(session()->has('Sucesso'))
                  <div class="alert alert-success">
                      {{ session()->get('Sucesso') }}
                  </div>
                  @endif
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul style="padding: 0px;">
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  <hr class="outliner"></hr>
                  <br>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="mark">Informações básicas</label>
                    </div>
                    <div class="col-md-12 mb-3">
                      <hr class="divider"></hr>
                    </div>
                  </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static ">Tamanho total (HA)</label><br>
                            <label class="label-ntstatic">{{ $propriedade->tamanho_total}}</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="label-static ">Fonte de Água</label><br>
                            <label class="label-ntstatic">{{ $propriedade->fonte_de_agua}}</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label class="mark">Localização</label>
                      </div>
                      <div class="col-md-12 mb-3">
                        <hr class="divider"></hr>
                      </div>
                    </div>
                    @if($propriedade->endereco->nome_rua)
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="label-static">Logradouro</label><br>
                            <label class="label-ntstatic">{{ $propriedade->endereco->nome_rua}}</label>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="label-static">Número</label><br>
                            <label class="label-ntstatic">{{ $propriedade->endereco->numero}}</label>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="label-static">Bairro</label><br>
                            <label class="label-ntstatic">{{ $propriedade->endereco->bairro}}</label>
                        </div>
                    </div>
                    @endif

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="label-static ">Cidade</label><br>
                            <label class="label-ntstatic">{{ $propriedade->endereco->cidade}}</label>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static ">Estado</label><br>
                            <label class="label-ntstatic">{{ $propriedade->endereco->estado}}</label>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="label-static" for="cep">CEP</label><br>
                            <label class="label-ntstatic">{{ $propriedade->endereco->cep}}</label>
                        </div>
                    </div>

                    @if($propriedade->endereco->ponto_referencia)
                    <div class="form-group">
                        <label class="label-static">Ponto de Referência</label><br>
                        <label class="label-ntstatic">{{ $propriedade->endereco->ponto_referencia}}</label>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
