@extends('layouts.app')

@section('content')
<div class="container-main">
    <div class="upper-div">
        <h1 class="marker">Bem-Vindo!</h1>
    </div>
    <br>
    <br>
    <div class="upper-div">
        <div class="row">
            <div class="col-md-4">
                <button>
                   <a href="{{route('user.ver_perfil')}}">
                        <img class="imagem-home" src="{{ asset('images/info.png') }}" alt="">
                        <span class="label-ntstatic">Minhas Informações</span>
                    </a>
                </button>
            </div>
            <div class="col-md-4">
                <button>
                    <a href="{{route('user.coordenador.ver_ocs')}}">
                        <img class="imagem-home" src="{{ asset('images/group.png') }}" alt="">
                        <span class="label-ntstatic">Ocs</span>
                    </a>
                </button>
            </div>
            <div class="col-md-4 ">
                <button>
                    <a href="{{route('user.verPropriedade')}}">
                        <img class="imagem-home" src="{{ asset('images/farm.png') }}" alt="">
                        <span class="label-ntstatic">Propriedade</span>
                    </a>
                </button>
            </div>

            <div class="col-md-4 ">
                <button>
                    <a href="{{route('user.coordenador.listar_reunioes')}}">
                        <img class="imagem-home" src="{{ asset('images/meeting.png') }}" alt="">
                        <span class="label-ntstatic">Reuniões</span>
                    </a>
                </button>
            </div>
        </div>
        <br>
        <div class="row">

        </div>
    </div>
</div>
@endsection
