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
                    &nbsp Minhas informações
                </a>
            </li>
            <li class="active">
                <a data-toggle="collapse" aria-expanded="false" class="btn botao-menu dropdown-toggle menu" href="">
                    <i class=""></i>
                    <img class= "imagem-botao-menu" src="{{asset('images/logo_propriedade.png')}}" alt="">
                    &nbsp Propriedade
                </a>
                <ul class="collapse list-unstyled" id="propriedadeSubMenu">
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.verPropriedade')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Informações</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.canteiroProducao.listar')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Canteiros</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a class = "btn botao-menu" href="{{route('user.coordenador.listar_reunioes')}}">
                    <i class=""></i>
                    <img class= "imagem-botao-menu reuniao" src="{{asset('images/logo_reuniao.png')}}" alt="">
                    &nbsp Reuniões
                </a>
            </li>
            <li class="active">
                <a data-toggle="collapse" aria-expanded="false" class = "btn botao-menu dropdown-toggle menu" href="">
                    <i class=""></i>
                    <img class= "imagem-botao-menu" src="{{asset('images/logo_ocs.png')}}" alt="">
                    &nbsp OCS
                </a>
                <ul class="collapse list-unstyled" id="ocsSubMenu">
                    <li>
                        <a class= "btn botao-menu" href="{{route('user.coordenador.ver_ocs')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Informações</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu" href="{{route('user.coordenador.listar_produtores')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Produtores</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    </nav>
</div>

<script>
    $('.dropdown-toggle').dropdown()
</script>
@endauth
