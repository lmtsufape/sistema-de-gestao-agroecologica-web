@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="padding: 0px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class = 'jumbotron bg-white'>
    <h1 class="marker">Agendar reunião</h1>
    <form method="POST" action="{{route('user.coordenador.agendarReuniao.salvar')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label label-static">Nome da reunião</label>
            <div class="col-md-6">
                <input type='text' class="form-control input-stl" placeholder = "Digite o nome da reunião" name='nome' id='nome' value="{{old('nome')}}"/>    
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <label for="data_reuniao" class="label-static">Data da reunião</label>
            <input type="date" class="form-control input-stl" name="data" id="data" value="{{old('data')}}">
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label label-static">Local</label>
            <div class="col-md-6">
                <input type='text' class="form-control input-stl" placeholder = "Digite o local da reunião" name='local' id='local' value="{{old('local')}}"/>    
            </div>
        </div>
    
        <br>

        <div class="form-group">
            <div class="col-md-6">
                <button class="btn botao-submit" type="submit">Registrar</button>            
            </div>
        </div>
    </form>
</div>

@endsection