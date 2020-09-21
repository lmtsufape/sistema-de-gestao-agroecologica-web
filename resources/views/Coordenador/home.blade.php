@extends('layouts.app')

@section('content')
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