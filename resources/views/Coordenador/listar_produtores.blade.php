@extends('layouts.app')

@section('content')

<div class="container-main">
<div class="upper-div">
    <h1 class="marker">Reuniões</h2>
    <table class="table">
        <thead class="black white-text">
          <tr>
            <th scope="col">Nome do Produtor</th>
            <th scope="col">Cpf</th>
            <th scope="col">Ver perfil</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($produtores as $produtor)
                <tr class='reuniao'>
                <td>{{$produtor->nome}}</td>
                <td>{{$produtor->cpf}}</td>
                <td><a href="{{route('user.coordenador.ver_produtor', ['id_produtor' => $produtor->id])}}">
                    <span class="label-ntstatic"><img class="imagem-menor" src="{{ asset('images/eye.png') }}" alt=""></span>
                </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
