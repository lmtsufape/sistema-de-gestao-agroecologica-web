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
                <a data-toggle="collapse" aria-expanded="false" class="btn botao-menu dropdown-toggle menu" href="">
                    <i class=""></i>
                    <img class= "imagem-botao-menu" src="{{asset('images/logo_informacoes.png')}}" alt="">
                    &nbsp Minhas informações
                </a>
                <ul class="collapse list-unstyled" id="propriedadeSubMenu">
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.ver_perfil')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Informações</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.editarPerfil')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Editar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.alterarSenha')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Alterar senha</a>
                    </li>
                </ul>
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
                        <a class= "btn botao-menu subButton" href="{{route('user.editarPropriedade')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Editar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.canteiroProducao.listar')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Canteiros</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a data-toggle="collapse" aria-expanded="false" class="btn botao-menu dropdown-toggle menu" href="">
                    <i class=""></i>
                    <img class= "imagem-botao-menu reuniao" src="{{asset('images/logo_reuniao.png')}}" alt="">
                    &nbsp Reuniões
                </a>
                <ul class="collapse list-unstyled" id="propriedadeSubMenu">
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.coordenador.listar_reunioes')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Listar</a>
                    </li>
                    <?php if (Auth::user()->tipo_perfil == "Coordenador"): ?>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.coordenador.reunioes.criar')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Agendar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.coordenador.reunioes.registrar')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Registrar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.coordenador.reunioes.retificar')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Retificar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('user.coordenador.reunioes.cancelar')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Cancelar</a>
                    </li>
                  <?php endif ?>
                </ul>
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
                        <a class= "btn botao-menu" href="{{route('user.coordenador.listar_produtores')}}">&nbsp &nbsp &nbsp &nbsp &nbsp● Membros</a>
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
