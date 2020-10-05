<nav class="navbar navbar-expand-md navbar-dark navegação mb-5">
    <a class="navbar-brand mb-0 h1" href="#"><img class="img-thumbnail imagem" src="{{ asset('images/logo2.png') }}" alt="Logo Sistema de Gestão Agricola"> Sistema de Gestão Agrícola</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                @if(Route::currentRouteName() == 'register')
                    <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-outline-light botão">Login</button></a>
                @else
                    <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-outline-light botão">Cadastrar</button></a>
                @endif
                </li>
            @endauth

            
        </ul>
    </div>
</nav>

<!-- A IMAGEM USADA É SÓ UM EXEMPLO, LOGO AINDA EM ANDAMENTO"-->