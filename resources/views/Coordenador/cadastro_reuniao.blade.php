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
    <h1 class="marker">Registrar reunião</h1>
    <form method="POST" action="{{route('user.coordenador.cadastrarReuniao.salvar')}}" enctype="multipart/form-data">
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
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label label-static">Participantes</label>
            <div class="col-md-10">
                @foreach ($produtores as $produtor)
                    <div class="col-md-6">
                        <input class="form-check-input col-md-1" type="checkbox" value="{{$produtor->nome}}" name="participantes[]">
                        <label class="form-check-label">&nbsp &nbsp{{$produtor->nome}} &nbsp &nbsp | &nbsp &nbsp {{$produtor->cpf}}</label>
                        <br>
                    </div>
                @endforeach
                <div class="col-md-6">
                    <input class="form-check-input col-md-1" type="checkbox" id="outros" name="outros" onchange="habilitar()">
                    <label class="form-check-label">&nbsp &nbspOutros</label>
                    <br>
                    <div class="col-md-12">
                        <textarea class="form-control input-stl" name="outrosParticipantes" id="outrosParticipantes" type="text" rows = "3" disabled></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label label-static">Ata</label>
            <div class="col-md-6">
                <textarea class="form-control input-stl" placeholder = "Digite a ata da reunião" name='ata' id='ata' rows = "6"></textarea>   
            </div>
        </div>

        <div class="col-md-6">
            <label for='nome' class="col-form-label label-static">Fotos</label>
            <div class="col-md-6">
                <input type="file" name="fotos[]" class="custom-file-input input-stl" id="fotos" multiple="multiple" accept="image/*">
                <label class="custom-file-label" for="fotos">Escolha as fotos</label>
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

<script>
    function habilitar(){
        if(document.getElementById('outros').checked){
            document.getElementById('outrosParticipantes').removeAttribute("disabled");
        }else{
            document.getElementById('onoff').value='';
            document.getElementById('outrosParticipantes').setAttribute("disabled", "disabled");
        }
    }
</script>

@endsection