@extends('layouts.app')

@section('content')

<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-10">
                    <h1 class="marker">Cancelar reunião agendada</h1>
                </div>
              </div>


        <hr class="outliner"></hr>

        <div style="overflow: auto; height: 450px">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="nome-col">Nome da reunião</th>
                    <th scope="col" class="nome-col">Data</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($reunioes_agendadas as $reuniao_agendada)
                    @if($reuniao_agendada->registrada == false)
                        <tr class='reuniao'>
                            <td class='nome_reuniao basic-space'><a class="cor-texto" href="{{route('user.coordenador.cancelarReuniao', ['reuniao_agendada_id' => $reuniao_agendada->id])}}">{{$reuniao_agendada->nome}}</a></td>
                            <td class='data_reunião cor-texto basic-space'>{{$reuniao_agendada->dataFormatada()}}</td>
                        </tr>
                          @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection

@section('javascript')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
    $('#formAgendarReuniao').on('submit',function(event){
        event.preventDefault();

        let nome = $('#nome').val();
        let data = $('#data').val();
        let local = $('#local').val();

        $.ajax({
            url: 'http://localhost:8000/user/coordenador/agendar_reuniao/salvar',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                nome:nome,
                data:data,
                local:local,
            },
            sucess: function(response){
                console.log(response);
            },
        });
    });
</script> --}}

@endsection
