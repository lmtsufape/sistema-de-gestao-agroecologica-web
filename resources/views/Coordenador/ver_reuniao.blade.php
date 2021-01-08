@extends('layouts.app')

@section('content')
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Reunião</h1>
                </div>
            </div>
            <hr class="divider"></hr>
            <div class="inner-div">
                <label class="">Detalhes da reunião</label><br>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-static">Nome</label><br>
                    <label class="label-ntstatic">{{$reuniao->nome}}</label>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-static">Data</label><br>
                    <label class="label-ntstatic">{{$reuniao->dataFormatada()}}</label>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="label-static">Local</label><br>
                    <label class="label-ntstatic">{{$reuniao->local}}</label>
                </div>
            </div>
            @if ($reuniao->registrada == true)
            <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <label class="label-static">Ata</label><br>
                    <label class="label-ntstatic">{{$reuniao->reuniaoRegistrada->ata}}</label>
                </div>
            </div>
            <br>
            <div class="inner-div">
                <label class="">Imagens da reunião</label><br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="label-static">Fotos</label><br>
                </div>
                <div class="col-md-12">
                    @foreach ($reuniao->reuniaoRegistrada->fotosReuniao as $fotoReuniao)
                    <center><img src="{{asset('storage/' . $fotoReuniao->path)}}" alt="" width="600px"> <br> <br></center>
                    @endforeach
                </div>

            </div>
            <div class="inner-div">
                <label class="">Retificações</label><br>
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
        </div>
        @endif

    </div>
</div>
</div>
@endsection
