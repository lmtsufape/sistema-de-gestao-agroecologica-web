@extends('layouts.app')

@section('content')
<div class = 'jumbotron' id='jumbotron'>
    <h3 class="display-5">Registrar reunião</h3>
    <form method="POST" action="{{route('user.coordenador.cadastrarReuniao.salvar')}}">
        @csrf
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Nome da reunião</label>
            <div class="col-md-6">
                <input type='text' class="form-control" placeholder = "Digite o nome da reunião" name='nome_reuniao' id='nome_reuniao'/>    
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <label for="data_reuniao">Data da reunião</label>
            <input type="date" class="form-control" name="data_reuniao">
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Participantes</label>
            <div class="col-md-6">
                <textarea class="form-control" placeholder = "Digite o nome dos participantes" name='nome_participantes' id='nome_participantes' rows = "3"></textarea>   
            </div>
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Descrição</label>
            <div class="col-md-6">
                <textarea class="form-control" placeholder = "Digite a descrição da reunião" name='descricao_reuniao' id='descricao_reuniao' rows = "6"></textarea>   
            </div>
        </div>
        <div>
            <label for='nome' class="col-md-6 col-form-label">Fotos</label>
            <div class="col-md-6">
                <input class="btn btn-primary" type="file" name="arquivo[]" multiple="multiple" accept="image/*" id="fotos" name="fotos"/><br><br>
            </div>
        </div>
        {{-- adicionar Upload de fotos --}}
        <div class="form-group">
            <div class="col-md-6">
                <button class="btn botao-submit" type="submit">Registrar</button>            
            </div>
        </div>
    </form>
</div>

@endsection