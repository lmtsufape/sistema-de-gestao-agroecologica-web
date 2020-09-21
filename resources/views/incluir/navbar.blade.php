<nav>
    <div class="logo"></div>

    <div class="icones">
        @if(Auth::check())
            <div class="notificacoes">
                <img src="{{ asset('images/notifications.png') }}" alt="" onclick=>
            </div>
            <div class="menu">
                <img src="{{ asset('images/menu.png')}}" alt="dropdown menu" onclick=dropdownMenu()>
            </div>
        @endif
    </div>
    
</nav>