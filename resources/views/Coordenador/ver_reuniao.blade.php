@extends('layouts.app')

@section('content')
<div class = 'jumbotron' id='jumbotron'>
    <h3 class="display-5">Informações da reunião</h3>
    <div class="row">
        <div class="col-md-4"> <br>
            <h4>Nome</h4>
            <label for="">{{$reuniao->nome}}</label>
        </div>
        <div class="col-md-4"> <br>
            <h4>Data</h4>
            <label for="">{{$reuniao->data}}</label>
        </div>

        <div class="col-md-4">
            <h4>Local</h4>
            <label for="">{{$reuniao->local}}</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"> <br>
            <h4>Partcipantes</h4>
            <label for="">{{$reuniao->participantes}}</label>
        </div>
        <div class="col-md-4"> <br>
            <h4>Ata</h4>
            <label for="">{{$reuniao->ata}}</label>
        </div>
    </div>
</div>
@endsection