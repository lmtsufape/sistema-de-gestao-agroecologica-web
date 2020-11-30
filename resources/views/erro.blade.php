@extends('layouts.app')

@section('content')

<div class="container-main">
    <div class="upper-div">
        <h1 class="marker">ERRO!!!</h1>
    </div>
    <br>
    <br>
    <div class="formulario upper-div">
        <div class="row">
          <div class="col-md-12 d-flex justify-content-center">
              <h2 class="label-static">{{$erro}}</h2>
          </div>
        </div>
    </div>
</div>


@endsection
