@extends('layouts.app')

@section('content')
<div class = 'jumbotron' id='jumbotron'>
    <h3 class="display-5">Registrar reunião</h3>
    <form action="{{route('user.coordenador.cadastrarReuniao.salvar')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Nome da reunião</label>
            <div class="col-md-6">
                <input type='text' class="form-control" placeholder = "Digite o nome da reunião" name='nomeReuniao' id='nomeReuniao'/>    
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <label for="data de nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento">
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Participantes</label>
            <div class="col-md-6">
                <textarea class="form-control" placeholder = "Digite o nome dos participantes" name='nomeParticipantes' id='nomeParticipantes' rows = "3"></textarea>   
            </div>
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Descrição</label>
            <div class="col-md-6">
                <textarea class="form-control" placeholder = "Digite a descrição da reunião" name='descricaoReuniao' id='descricaoReuniao' rows = "6"></textarea>   
            </div>
        </div>
        {{-- adicionar Upload de fotos --}}
        <div class="form-group">
            <div class="col-md-6">
                <a type="button" class="btn btn-success" href="{{route('user.coordenador.cadastrarReuniao.salvar')}}" >Registrar</a>
            </div>
        </div>
    </form>
</div>

@endsection