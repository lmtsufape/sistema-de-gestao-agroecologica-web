<nav class="navbar navbar-expand-md navbar-dark navegação">
    <a class="navbar-brand mb-0 h1" href="/home">Sistema de Gestão Agrícola</a> {{--  <img class="img-thumbnail imagem" src="{{ asset('images/logo2.png') }}" alt="Logo Sistema de Gestão Agricola"> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item row">
                    <a class="nav-link" href="{{route('home')}}"><button type="button" class="btn btn-outline-light botão">Início</button></a>
                    <a class="nav-link" href=""><button type="button" class="btn btn-outline-light botão">Sobre</button></a>
                {{-- @if(Route::currentRouteName() == 'register')
                    <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-outline-light botão">Login</button></a>
                @else
                    <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-outline-light botão">Cadastrar</button></a>
                @endif --}}
                </li>
            @endauth

            @auth
            <li>
                <a id ="inicio" href="{{route('home')}}" class="nav-link" role="button">Início</a>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Olá, <strong>{{ Auth::user()->nome }}</strong>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 <?php if (Auth::user()->tipo_perfil == "Associacao"): ?>
                   <a class="dropdown-item" href="{{ route('associacao.editarAssociacao') }}"
                       >
                       Editar informações
                   </a>
                 <?php else: ?>
                  <a class="dropdown-item" href="{{ route('user.editarPerfil') }}"
                      >
                      Editar perfil
                  </a>
                  <a class="dropdown-item" href="{{ route('user.editarPropriedade') }}"
                      >
                      Editar propriedade
                  </a>
                <?php endif; ?>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth

        </ul>
    </div>
</nav>

<!-- A IMAGEM USADA É SÓ UM EXEMPLO, LOGO AINDA EM ANDAMENTO"-->
