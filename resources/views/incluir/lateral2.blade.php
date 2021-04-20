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
                    <img class= "imagem-botao-menu" src="{{asset('images/logo_propriedade.png')}}" alt="">
                    &nbsp Associação
                </a>
                <ul class="collapse list-unstyled" id="propriedadeSubMenu">
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.verAssociacao')}}">&nbsp &nbsp &nbsp● Informações</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.editarAssociacao')}}">&nbsp &nbsp &nbsp● Editar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.alterarSenha')}}">&nbsp &nbsp &nbsp● Mudar Senha</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a data-toggle="collapse" aria-expanded="false" class="btn botao-menu dropdown-toggle menu" href="">
                    <i class=""></i>
                    <img class= "imagem-botao-menu" src="{{asset('images/menu.png')}}" alt="">
                    &nbsp OCS
                </a>
                <ul class="collapse list-unstyled" id="propriedadeSubMenu">
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.listarOcs')}}">&nbsp &nbsp &nbsp● Listar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.cadastrarOcs')}}">&nbsp &nbsp &nbsp● Criar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.infoOcs')}}">&nbsp &nbsp &nbsp● Editar</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.removerOcs')}}">&nbsp &nbsp &nbsp● Remover</a>
                    </li>
                    <li>
                        <a class= "btn botao-menu subButton" href="{{route('associacao.cadastrarMembro')}}">&nbsp &nbsp &nbsp● Adicionar membros</a>
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
