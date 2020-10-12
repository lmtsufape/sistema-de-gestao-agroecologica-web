@extends('layouts.app')

@section('content')
<form action="{{ route('logout') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">logout from account</button>
    </form>
    <div class="row">
        <div class="col-md-4">
            <button>
               <a href="/home">
                    <img class="imagem-home" src="{{ asset('images/info.png') }}" alt="">
                    <span>Minhas Informações</span>
                </a>
            </button>
        </div>
        <div class="col-md-4">
            <button>
                <a href="/home">
                    <img class="imagem-home" src="{{ asset('images/group.png') }}" alt="">
                    <span>Usuários</span>
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
    <div class="row">
        <div class="col-md-4 ">
            <button>
                <a href="{{route('user.verPropriedade')}}">
                    <img class="imagem-home" src="{{ asset('images/meeting.png') }}" alt="">
                    <span>Propriedade</span>
                </a>
            </button>
        </div>
    </div>
@endsection
