@extends('layouts.app')

<script>
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchbar");
    filter = input.value.toUpperCase();
    table = document.getElementById("participantesTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

var prods = [];
var nomes = [];

function mudaCor(id, nome){
    var isArray = false;
    prods.forEach(function (item, indice, array) {
        if (item == id) {
            isArray = true;
            prods.splice(indice);
            nomes.splice(indice);
        }
    });
    var n = "confirm" + id;
    n.concat(id);
    if (isArray) {
        document.getElementById("bt" + id).style.backgroundColor = "#666666";
        document.getElementById(n).style.display = 'none';
    } else {
        document.getElementById("bt" + id).style.backgroundColor = "#1593E7";
        document.getElementById(n).style.display = 'block';
        prods.push(id);
        nomes.push(nome);
    }
    document.getElementById('participantes').value = nomes;
    console.log(nomes);
}
let list = new DataTransfer();

function removeImage(file, image) {
    list.items.remove(file);
    preview.removeChild(image);
    lbfoto.innerHTML = 'Escolha mais imagens';
}

function mudaCorAll(pros){
  for (var i = pros.length - 1; i >=  0; i--) {
    mudaCor(pros[i]['id'], pros[i]['nome']);
  }
}


function previewImages() {

    var preview = document.querySelector('#preview');

    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }
    function readAndPreview(file) {
        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            document.getElementById('lbfoto').innerHTML +=  file.name + ', ';
            var image = new Image();
            image.className = 'bt-spec';
            image.title  = file.name;
            image.src    = this.result;
            image.onclick = function(){removeImage(file, image);};
            preview.appendChild(image);
            list.items.add(file);
            lbfoto.innerHTML = 'Escolha mais imagens';
            //btn.style.margin = '-50px';
        });
        reader.readAsDataURL(file);

    }

}

function enviarFotos(){
  document.querySelector('#fotos').files = list.files;
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#fotos').addEventListener("change", previewImages);
    document.querySelector('#botao-registrar-reuniao').addEventListener("click", enviarFotos);

});

</script>

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
                            <label class="cor-texto" for="">{{$reuniao->dataFormatada()}}</label>
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
                            <input type="text" class="form-control" placeholder="Nome ou CPF do participante" id='searchbar' onkeyup="myFunction()">
                        </div>
                        <div class="col-md-5">
                            <img id="botao-pesquisa" class="imagens-acoes" src="{{asset('images/logo_procurar.png')}}" alt="">
                        </div>
                        <div class="col-md-2">
                            <!--<a id="botao-adicionar-participante" href="" class="btn">Adicionar participante</a>-->
                        </div>
                    </div>
                    <br>
                    <input type="hidden" id="participantes" name="participantes">
                    {{-- Colocar funcionalidade de busca e botão para add participantes--}}
                    <div style="overflow: auto; height: 300px">
                        <table class="table" id="participantesTable">
                            <thead>
                                <tr class="participantes">
                                    <th scope="col" class="nome-col" style="width: 400px">Nome</th>
                                    <th scope="col" class="nome-col">CPF</th>
                                    <th scope="col" class="nome-col">Status</th>
                                    <th scope="col" class="nome-col">Ação</th>
                                    <th scope="col" class="nome-col"><button class="btn botaoPresente" type="button" id="btFirst"  onclick="mudaCorAll({{$allProds}})">Selecionar Todos</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtores as $produtor)
                                <tr>
                                    <td class="cor-texto">{{$produtor->nome}}</td>
                                    <td class="cor-texto">{{$produtor->cpf}}</td>
                                    <td>
                                        <img class="imagens-acoes" style="width: 45px; display: none" src="{{asset('images/logo_registrado.png')}}" alt="" id="confirm{{$produtor->id}}">
                                    </td>
                                    <td colspan="2">
                                        <button class="btn botaoPresente" type="button" id="bt{{$produtor->id}}" onclick="mudaCor('{{$produtor->id}}', '{{$produtor->nome}}')"><img id="imagemPresente" src="{{asset('images/logo_presente.png')}}" alt="">Presente</button>
                                    </td>
                                </tr>
                                @endforeach
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
                <!--<img src="" height="200" alt="Image preview...">   -->
                {{-- Álbum --}}
                <div>
                    <label id="nome-tabela-reuniao" class = "col-md-12" for="">Álbum</label>
                    <div style="background-color: #05856F;" class="form-row inner-div">
                        <label class="">Você pode remover as imagens clicando sobre elas!</label>
                    </div>
                    <div class="col-md-6">
                        <input type="file" multiple='multiple' name='fotos[]' class="custom-file-input input-stl" id="fotos" accept="image/*" placeholder="Escolha as fotos">
                        <label class="btn btn-primary btn-block btn-outlined" id="lbfoto" for="fotos">Escolha as fotos</label>
                    </div>
                    <div class="col-md-12" id="preview">

                    </div>
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

@endsection
