@extends('layouts.app')

@section('content')

<a type="button" class="btn btn-success" href="{{route('user.coordenador.cadastrarReuniao')}}" >Registrar reunião</a>

<div class = 'jumbotron' id='jumbotron'>
    <h2 class="display-5">Reuniões</h2>
    <table class="table">
        <thead class="black white-text">
          <tr>
            <th scope="col">Nome da reunião</th>
            <th scope="col">Data</th>
          </tr>
        </thead>
        <tbody>
            {{-- colocar reuniões --}}
        </tbody>
    </table>
</div>
@endsection