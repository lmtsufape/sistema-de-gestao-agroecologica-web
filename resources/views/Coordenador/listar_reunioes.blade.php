@extends('layouts.app')

@section('content')

<div class = 'jumbotron' id='jumbotron'>
    <a type="button" class="btn btn-success" href="{{route('user.coordenador.cadastrarReuniao')}}" >Registrar uma nova reunião</a>


    <h2 class="display-5">Reuniões</h2>
    <table class="table">
        <thead class="black white-text">
          <tr>
            <th scope="col">Nome da reunião</th>
            <th scope="col">Data</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reunioes as $reuniao)
                <tr class='reuniao'>
                <td class='nome_reuniao'><a href="{{route('user.coordenador.ver_reuniao', ['id_reuniao' => $reuniao->id])}}">{{$reuniao->nome}}</a></td>
                    <td class='data_reunião'>{{$reuniao->data}}</td>
                </tr>    
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection