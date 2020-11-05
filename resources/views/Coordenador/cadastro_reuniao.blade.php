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

<div class = 'jumbotron' id='jumbotron'>
    <h3 class="display-5">Registrar reunião</h3>
    <form method="POST" action="{{route('user.coordenador.cadastrarReuniao.salvar')}}">
        @csrf
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Nome da reunião</label>
            <div class="col-md-6">
                <input type='text' class="form-control" placeholder = "Digite o nome da reunião" name='nome' id='nome' value="{{old('nome')}}"/>    
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <label for="data_reuniao">Data da reunião</label>
            <input type="date" class="form-control" name="data" id="data" value="{{old('data')}}">
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Local</label>
            <div class="col-md-6">
                <input type='text' class="form-control" placeholder = "Digite o local da reunião" name='local' id='local' value="{{old('local')}}"/>    
            </div>
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Participantes</label>
            <div class="col-md-10">
                @foreach ($produtores as $produtor)
                    @if ($produtor->tipo_perfil == 'Produtor')
                        <input class="form-check-input" type="checkbox" value="{{$produtor->nome}}" name="participantes[]">
                        <label class="form-check-label">&nbsp &nbsp{{$produtor->nome}} &nbsp &nbsp | &nbsp &nbsp {{$produtor->cpf}}</label>
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Ata</label>
            <div class="col-md-6">
                <textarea class="form-control" placeholder = "Digite a ata da reunião" name='ata' id='ata' rows = "6"></textarea>   
            </div>
        </div>
        <div>
            {{-- <label for='nome' class="col-md-6 col-form-label">Fotos</label> --}}
            <div class="col-md-6">
                {{-- <input class="btn btn-primary" type="file" name="arquivo[]" multiple="multiple" accept="image/*" id="fotos" name="fotos"/><br><br> --}}
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