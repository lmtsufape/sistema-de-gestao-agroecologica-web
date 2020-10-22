@extends('layouts.app')

@section('content')
<form action="{{ route('logout') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">logout from account</button>
    </form>
    <div class="botoes-conjunto">
        <div class="botao">
            <button>
               <a href="/home">
                    <img src="{{ asset('images/info.png') }}" alt="">
                    <span>Minhas Informações</span>
                </a>
            </button>
        </div>
        <div class="botao">
            <button>
                <a href="/home">
                    <img src="{{ asset('images/group.png') }}" alt="">
                    <span>Usuários</span>
                </a>
            </button>
        </div>
        <div class="botao">
            <button>
                <a href="/home">
                    <img src="{{ asset('images/meeting.png') }}" alt="">
                    <span>Reuniões</span>
                </a>
            </button>
        </div>
    </div>
@endsection
