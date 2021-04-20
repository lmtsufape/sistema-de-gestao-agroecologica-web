@extends('layouts.app')

@section('content')
<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="marker">Cadastro do produtor</h1>
                </div>
            </div>


            <form class="formulario" method="post" action="{{ route('user.coordenador.cadastrarProdutor.salvar') }}">
                @csrf
                <hr class="outliner"></hr>
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul style="padding: 0px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                @if(session()->has('Sucesso'))
                <div class="alert alert-success">
                  {{ session()->get('Sucesso') }}
                </div>
                @endif
                <br>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label class="mark">Produtor</label>
                  </div>
                  <div class="col-md-12 mb-3">
                    <hr class="divider"></hr>
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="label-static required" for="nome">Nome Completo</label>
                        <input type="text" class="form-control input-stl" id="nome" name="nome" placeholder="Nome Completo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="label-static required">CPF</label>
                        <input type="number" class="form-control input-stl" name="email" placeholder="CPF apenas números">
                    </div>
                </div>

                <hr class="outliner"></hr>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label style="color: red" class="label-static required">Campos obrigatórios</label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn botao-submit" type="submit">Cadastrar</button>
                    </div>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
</div>
@endsection
