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

function removeAta() {
    ata.value = '';
    prvata.innerHTML = '';
    lbata.innerHTML = 'Escolha outra ATA';
    console.log(ata.files);
}

function mudaCorAll(pros){
  for (var i = pros.length - 1; i >=  0; i--) {
    mudaCor(pros[i]['id'], pros[i]['nome']);
  }
}


function previewAta() {

    var atapv = document.querySelector('#prvata');

    if (ata.files) {
      atapv.innerHTML = '';
     var a = readAndPreviewAta(ata.files[0]);
    }
    function readAndPreviewAta(file) {
        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...
        var read = new FileReader();

        read.addEventListener("load", function() {
          document.getElementById('lbata').innerHTML =  file.name;
          var image = new Image();
          image.className = 'bt-spec';
          image.title  = file.name;
          image.src    = this.result;
          image.style.width = "80%";
          image.style.height = "auto";
          image.style.marginLeft = "90px";
          image.style.marginBottom = "50px";
          image.onclick = function(){removeAta();};
          atapv.appendChild(image);
        });
        read.readAsDataURL(file);

    }

}
function previewImages() {
    var preview = document.querySelector('#preview');

    if (fotos.files) {
        [].forEach.call(fotos.files, readAndPreview);
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
    document.querySelector('#ata').addEventListener("change", previewAta);
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
          <br>
            <form method="POST" action="{{route('user.coordenador.registrarReuniao.salvar', ['id_reuniao' => $reuniao->id])}}" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-12">
                      <h1 class="marker">Registrar reunião</h1>
                  </div>
              </div>
              <hr class="outliner"></hr>
                @csrf
                {{-- Reunião --}}
                <div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="mark">Reunião</label>
                    </div>
                    <div class="col-md-12 mb-3">
                      <hr class="divider"></hr>
                    </div>
                  </div>
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
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="mark">Participantes</label>
                    </div>
                    <div class="col-md-12 mb-3">
                      <hr class="divider"></hr>
                    </div>
                  </div>
                    <div class="form-row has-search" id="search-bar">
                        <div class="col-md-2">
                            <label class="corLabelReuniao" id="labelProdutor">Membro</label>
                        </div>
                        <div class="col-md-3">
                            <span class="fa fa-search form-control-feedback" id='search-icon'></span>
                            <input type="text" class="form-control input-stl" placeholder="Nome ou CPF do participante" id='searchbar' onkeyup="myFunction()">
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
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="mark">Ata</label>
                    </div>
                    <div class="col-md-12 mb-3">
                      <hr class="divider"></hr>
                    </div>
                  </div>
                    <input style="margin-top: -100px" type="file" name='ata' class="custom-file-input input-stl" id="ata" accept="image/*" placeholder="Envie a imagem da ATA">
                    <label class="btn btn-primary btn-block btn-outlined bg-verde" id="lbata" for="ata">Envio da ata</label>
                    <br>
                    <div class="col-md-12" id="prvata">

                    </div>
                </div>
                <!--<img src="" height="200" alt="Image preview...">   -->
                {{-- Álbum --}}
                <div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label class="mark">Álbum</label>
                    </div>
                    <div class="col-md-12 mb-3">
                      <hr class="divider"></hr>
                    </div>
                  </div>
                      <input style="margin-top: -100px" type="file" multiple='multiple' name='fotos[]' class="custom-file-input input-stl" id="fotos" accept="image/*" placeholder="Escolha as fotos">
                      <label class="btn btn-primary btn-block btn-outlined bg-verde" id="lbfoto" for="fotos">Escolha as fotos</label>
                    <div class="col-md-12 justify-content-center" id="preview">

                    </div>
                    <br>
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
                    <button id="botao-registrar-reuniao" type="submit" class="btn btn-success fonteFooter bg-verde">Registrar reunião</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
