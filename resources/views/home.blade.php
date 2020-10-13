@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <button>
               <a href="{{route('user.ver_perfil')}}">
                    <img class="imagem-home" src="{{ asset('images/info.png') }}" alt="">
                    <span>Minhas Informações</span>
                </a>
            </button>
        </div>
        <div class="col-md-4">
            <button>
                <a href="{{route('user.coordenador.ver_ocs')}}">
                    <img class="imagem-home" src="{{ asset('images/group.png') }}" alt="">
                    <span>Ocs</span>
                </a>
            </button>
        </div>
        <div class="col-md-4 ">
            <button>
                <a href="/home">
                    <img class="imagem-home" src="{{ asset('images/meeting.png') }}" alt="">
                    <span>Reuniões</span>
                </a>
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 ">
            <button>
                <a href="{{route('user.verPropriedade')}}">
                    <img class="imagem-home" src="{{ asset('images/farm.png') }}" alt="">
                    <span>Propriedade</span>
                </a>
            </button>
        </div>
    </div>
@endsection
