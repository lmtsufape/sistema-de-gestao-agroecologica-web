@extends('layouts.app')

@section('content')

<div class = 'jumbotron bg-white'>
    @if($usuario->tipo_perfil == "Coordenador")
        <a type="button" class="btn btn-success" href="{{route('user.coordenador.agendarReuniao')}}" >Agendar reunião</a>
    @endif

    <h2 class="marker">Reuniões Agendadas</h2>
    <table class="table">
        <thead class="black white-text">
          <tr>
            <th scope="col" class="label-static">Nome da reunião</th>
            <th scope="col" class="label-static">Data</th>
            <th scope="col" class="label-static">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reunioes_agendadas as $reuniao_agendada)
                <tr class='reuniao'>
                    <td class='nome_reuniao'><a href="{{route('user.coordenador.verReuniao', ['id_reuniao' => $reuniao_agendada->id])}}">{{$reuniao_agendada->nome}}</a></td>
                    <td class='data_reunião'>{{$reuniao_agendada->data}}</td>
                    <td>
                        @if($reuniao_agendada->registrada == false)
                            <font color="red">Não registrada</font>
                        @else
                            <font color="green">Registrada</font>
                        @endif
                    </td>
                </tr>
                    
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection