@extends('layouts.app')

@section('content')
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Editar reunião</h1>
                </div>
            </div>
            <hr class="outliner"></hr>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Detalhes</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-static">Nome</label><br>
                    <label class="label-ntstatic">{{$reuniao->nome}}</label>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-static">Data</label><br>
                    <label class="label-ntstatic">{{$reuniao->data}}</label>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="label-static">Local</label><br>
                    <label class="label-ntstatic">{{$reuniao->local}}</label>
                </div>
            </div>
            @if ($reuniao->registrada == true)
            <div class="row">
                <div class="col-md-12">
                    <label class="label-static">Participantes</label><br>
                    @php
                    $nomeParticipantes = explode('/', $reuniao->reuniaoRegistrada->participantes);
                    @endphp
                    @foreach ($nomeParticipantes as $nome)
                    @if ($nome != "")
                    <label class="label-ntstatic">{{$nome}}</label><br>
                    @endif
                    @endforeach
                </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Ata</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <center><img src="{{asset('storage/' . $reuniao->reuniaoRegistrada->ata)}}" alt="" width="600px"> <br> <br></center>
                </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Imagens da reunião</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach ($reuniao->reuniaoRegistrada->fotosReuniao as $fotoReuniao)
                    <center><img src="{{asset('storage/' . $fotoReuniao->path)}}" alt="" width="300px"> <br> <br></center>
                    @endforeach
                </div>

            </div>
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label class="mark">Retificação</label>
              </div>
              <div class="col-md-12 mb-3">
                <hr class="divider"></hr>
              </div>
            </div>
            <div class="row">
                @foreach ($reuniao->reuniaoRegistrada->retificacao as $ret)
                <div class="col-md-10">
                    <label class="label-ntstatic">{{$ret->retificacao}}</label>
                </div>
                <div class="col-md-2">
                    <label class="label-ntstatic">{{$ret->dataFormatada()}}</label>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('user.coordenador.editarReuniao.salvar', ['id_reuniao' => $reuniao->id])}}">
                        @csrf
                        <label class="label-static">Nova Retificação</label><br>
                        <textarea type="text" class="form-control input-stl" name="retificacao" id='retificacao' rows="3"></textarea>
                        <input type="hidden" value="{{$reuniao->reuniaoRegistrada->id}}" name="id_reuniao">
                    </div>

                    <div class="col-md-12 mb-3">
                        <br>
                        <button class="btn botao-submit" type="submit">Adicionar retificação</button>
                    </div>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>
</div>
@endsection
