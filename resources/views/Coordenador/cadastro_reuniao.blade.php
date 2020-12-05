@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="padding: 0px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-registrar-reuniao">
    <div class = 'jumbotron' id="jumbotron-registrar-reuniao">
        <div id = 'cabecalho'>
            <div>
                <label id="cabecalho-reuniao" for="botao-agendar">Registrar reunião</label>
                <hr id="linha-registrar-reuniao" class="linha-cabecalho">
            </div>
            <form method="POST" action="{{route('user.coordenador.registrarReuniao.salvar', ['id_reuniao' => $reuniao->id])}}" enctype="multipart/form-data">
                @csrf
                {{-- Reunião --}}
                <div>
                    <label id="nome-tabela-reuniao" class = "col-md-12" for="">Reunião</label>
                    <div class="form-row">
                        <div class="col-md-10 mb-4">
                            <label class="corLabelReuniao" for="">Nome da reunião</label> <br>
                            <label class="cor-texto" for="">{{$reuniao->nome}}</label>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label class="corLabelReuniao" for="">Data da reunião</label> <br>
                            <label class="cor-texto" for="">{{$reuniao->data}}</label>
                        </div>
                    </div>
                </div>
                {{-- Participantes --}}
                <div>
                    <label id="nome-tabela-reuniao" class = "col-md-12" for="">Participantes</label>
                    <div class="form-row has-search" id="search-bar">
                        <div class="col-md-2">
                            <label class="corLabelReuniao" id="labelProdutor">Produtor</label>
                        </div>
                        <div class="col-md-3">
                            <span class="fa fa-search form-control-feedback" id='search-icon'></span>
                            <input type="text" class="form-control" placeholder="Nome ou CPF do participante" id='searchbar' onkeyup="searchParticipante()">
                        </div>
                        <div class="col-md-5">
                            <img id="botao-pesquisa" class="imagens-acoes" src="{{asset('images/logo_procurar.png')}}" alt="">
                        </div>
                        <div class="col-md-2">
                            <a id="botao-adicionar-participante" href="" class="btn">Adicionar participante</a>
                        </div>
                    </div>
                    <br>
                    {{-- Colocar funcionalidade de busca e botão para add participantes--}}
                    <div style="overflow: auto; height: 300px">
                        <table class="table">
                            <thead>
                            <tr class="participantes">
                                <th scope="col" class="nome-col" style="width: 400px">Nome</th>
                                <th scope="col" class="nome-col">CPF</th>
                                <th scope="col" class="nome-col">Status</th>
                                <th scope="col" class="nome-col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($produtores as $produtor)
                                        <td class="cor-texto">{{$produtor->nome}}</td>
                                        <td class="cor-texto">{{$produtor->cpf}}</td>
                                        <td>
                                            {{-- Colcoar status apos clicar no botaoPresente --}}
                                        </td>
                                        <td>
                                            <a id="botaoPresente" class="btn btn" href=""><img id="imagemPresente" src="{{asset('images/logo_presente.png')}}" alt=""> Presente</a>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Ata --}}
                <div>
                    <label id="nome-tabela-reuniao" class = "col-md-12" for="">Ata</label>
                    <label class="corLabelReuniao" for="">Ata da reunião</label> <br>
                    <div>
                        <textarea class="form-control" placeholder = "Digite a ata da reunião" name='ata' id='ata' rows = "5"></textarea>
                    </div>
                </div>
                
                {{-- Álbum --}}
                <div>
                    <label id="nome-tabela-reuniao" class = "col-md-12" for="">Álbum</label>
                    <div class="col-md-6">
                        <input type="file" name="fotos[]" class="custom-file-input input-stl" id="fotos" multiple="multiple" accept="image/*">
                        <label class="custom-file-label" for="fotos">Escolha as fotos</label>
                    </div>
                </div>
                <div>
                    <div id="linha-legenda"><hr></div>
                    <div>
                        <label class= "cor-texto" for="">Legenda:</label>
                    </div>
                    <div class="form-row">
                        <div class="div-lado">
                            <img id="botaoProcurar" class="imagens-acoes" src="{{asset('images/logo_procurar.png')}}" alt="">
                            <label class= "cor-texto" for="">Localizar participante</label>
                        </div>
                        <div class="col-md-3 mb-4">
                            <a id="labelCancelar-registrar" class="fonteFooter" href="{{route('user.coordenador.listar_reunioes')}}">Cancelar</a>
                        </div>
                        <button id="botao-registrar-reuniao" type="submit" class="btn btn-success fonteFooter">Registrar reunião</button>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>

<script>
    // function habilitar(){
    //     if(document.getElementById('outros').checked){
    //         document.getElementById('outrosParticipantes').removeAttribute("disabled");
    //     }else{
    //         document.getElementById('onoff').value='';
    //         document.getElementById('outrosParticipantes').setAttribute("disabled", "disabled");
    //     }
    // }
    function searchParticipante(){
        let input = document.getElementById('searchbar').value;
        input = input.toLowerCase();
        let participantes = document.getElementsByClassName('participantes');
        for(i=0; i<participantes.length; i++){
            if(!participantes[i].children[1].innerHTML.toLowerCase().includes(input)){
                participantes[i].style.display='none';
            }
            else{
                participantes[i].style.display='';
            }
        }
    }
</script> 

@endsection