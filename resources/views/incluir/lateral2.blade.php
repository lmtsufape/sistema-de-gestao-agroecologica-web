@auth
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>PMO Digital</h3>
        </div>

        <div class="trying">
        <ul class="list-unstyled components">
            <li class="active">
                <a class = "btn botao-menu" href="{{route('user.ver_perfil')}}">
                    <i class=""></i>
                    <img class= "imagem-botao-menu" src="{{asset('images/logo_informacoes.png')}}" alt="">
                    &nbsp Informações da associação
                </a>
            </li>
        </ul>
    </div>
    </nav>
</div>

<script>
    $('.dropdown-toggle').dropdown()
</script>
@endauth
