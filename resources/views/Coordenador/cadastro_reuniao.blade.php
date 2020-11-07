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
    <form method="POST" action="{{route('user.coordenador.cadastrarReuniao.salvar')}}" enctype="multipart/form-data">
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
                        <div class="col-md-6">
                            <input class="form-check-input col-md-1" type="checkbox" value="{{$produtor->nome}}" name="participantes[]">
                            <label class="form-check-label">&nbsp &nbsp{{$produtor->nome}} &nbsp &nbsp | &nbsp &nbsp {{$produtor->cpf}}</label>
                            <br>
                        </div>
                    @endif
                @endforeach
                <div class="col-md-6">
                    <input class="form-check-input col-md-1" type="checkbox" id="outros" name="outros" onchange="habilitar()">
                    <label class="form-check-label">&nbsp &nbspOutros</label>
                    <br>
                    <div class="col-md-12">
                        <textarea class="form-control" name="outrosParticipantes" id="outrosParticipantes" type="text" rows = "3" disabled></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for='nome' class="col-md-6 col-form-label">Ata</label>
            <div class="col-md-6">
                <textarea class="form-control" placeholder = "Digite a ata da reunião" name='ata' id='ata' rows = "6"></textarea>   
            </div>
        </div>

        <div class="col-md-6">
            <label for='nome' class="col-form-label">Fotos</label>
            <div class="col-md-6">
                <input type="file" name="fotos[]" class="custom-file-input" id="fotos" multiple="multiple" accept="image/*">
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