@extends('layouts.app')

@section('content')

<div class="container-main">
    <div class="row upper-div-2">
        <div class="col-md-3 img-left">

        </div>
        <div class="col-md-9">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="padding: 0px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>
            <h1 class="marker">Novo Manejo</h1>
            <div class="formulario">
                <form class="formulario" method="post" action="{{ route('user.manejo.salvar') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="marker">Tipo de manejo:</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="label-static">Animal:</label>
                            <input value="Animal" type="radio" name="tipo_manejo">
                        </div>
                        <div class="col-md-4">
                            <label class="label-static">Vegetal:</label>
                            <input value="Vegetal" type="radio" name="tipo_manejo">
                        </div>
                        <div class="col-md-4">
                            <label class="label-static">Beneficiamento:</label>
                            <input value="Beneficiamento" type="radio" name="tipo_manejo">
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="marker">Cadastro do Manejo:</h2>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label class="label-static-2">Nome da técnica:</label>
                            <textarea class="form-control input-stl" id="nome_tecnica" name="nome_tecnica" rows="1"></textarea>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label class="label-static-2">Manejo:</label>
                            <textarea class="form-control input-stl" id="manejo" name="manejo" rows="3"></textarea>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label class="label-static-2">Tratamento dos residuos:</label>
                            <textarea class="form-control input-stl" id="tratamento_residuos" name="tratamento_residuos" rows="3"></textarea>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label class="label-static-2">Destino dos resíduos:</label>
                            <textarea class="form-control input-stl" id="destino_residuos" name="destino_residuos" rows="3"></textarea>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label class="label-static-2">Observações</label>
                            <textarea class="form-control input-stl" id="observacoes" name="observacoes" rows="3"></textarea>
                            <br>
                            <br>
                        </div>
                    </div>
                    <br>
                    <button class="btn botao-submit" type="submit">Cadastrar</button>
                </form>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>

    @endsection
