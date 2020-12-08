@extends('layouts.app')

<script>

$(document).on("click", "#ativarView", function () {
    var myBookId = $(this).data('id');
    $(".modal-body #bookId").val( myBookId );
    // As pointed out in comments,
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});

function showDiv(id, id1, id2) {
    document.getElementById(id).style.display = "block";
    document.getElementById(id1).style.display = "none";
    document.getElementById(id2).style.display = "none";
}


</script>

@section('content')

<div class="row extra-space">
    <div class="col-md-12 upper-div">
        <div class="especifies">
            <br>
            <div class="row">
                <div class="col-md-10">
                    <h1 class="marker">Produtores</h1>
                </div>
                @if($perfil=='Coordenador')
                <div class="col-md-2">
                    <a class="btn edit-bt bigger-bt bg-verde" href="{{ route('user.coordenador.cadastrarProdutor') }}" >Cadastrar produtor</a>
                </div>
                @endif
            </div>
            <hr class="divider"></hr>
            <div class="inner-div">
                <label class="">Lista de produtores</label>
            </div>
            <div class="wrp-bigger">
            <table class="table">
                <thead class="black white-text">
                    <tr>
                        <th scope="col" class="nome-col"><b>Nome do Produtor</b></th>
                        <th scope="col" class="nome-col"><b>Cpf</b></th>
                        <th scope="col" class="nome-col" colspan="2"><b>Ações</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtores as $produtor)
                    <tr>
                        <td class="basic-space label-ntstatic">{{$produtor->nome}}</td>
                        <td class="basic-space">{{$produtor->cpf}}</td>
                        <td class="basic-space label-ntstatic" id="ativarView"  data-id="{{$produtor->id}}" data-toggle = "modal" data-target="#verProdutor{{$produtor->id}}">
                            <span class="label-ntstatic"><img id="botao-editar" class="imagens-acoes" src="{{asset('images/person.png')}}" alt=""></span>
                        </td>
                        <td class="basic-space label-ntstatic">
                    <div id="verProdutor{{$produtor->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div id="contentModal" class="modal-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="marker">Informações sobre o canteiro</h1>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr id="linhaCabecalhoReuniao">
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button href="#prod" class="bt-aba" onclick="showDiv('prod{{$produtor->id}}', 'prop{{$produtor->id}}', 'produ{{$produtor->id}}')">Produtor</button>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    @if($produtor->propriedade)
                                    <div class="col-md-2">
                                        <button href="#prop"class="bt-aba" onclick="showDiv('prop{{$produtor->id}}', 'prod{{$produtor->id}}', 'produ{{$produtor->id}}')">Propriedade</button>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <button href="#produ"class="bt-aba" onclick="showDiv('produ{{$produtor->id}}', 'prod{{$produtor->id}}', 'prop{{$produtor->id}}')">Produções</button>
                                    </div>
                                    @endif
                                </div>
                                <div id="prod{{$produtor->id}}">
                                    <div class="borda-terra">
                                        <div style="margin-left: 15px; margin-top: 10px;">
                                            <div class="inner-aba">
                                                <label class="">Informações Básicas</label>
                                            </div>
                                        </div>
                                        <div style="margin-left: 15px;">
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Nome</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->nome}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Cpf</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->cpf}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Rg</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->rg}}</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label class="label-static">Telefone</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->telefone}}</label>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label class="label-static">Data de Nascimento</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->data_nascimento}}</label>
                                                </div>
                                                @if($produtor->nome_conjugue)
                                                <div class="col-md-12 mb-2">
                                                    <label class="label-static">Nome Conjugue</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->nome_conjugue}}</label>
                                                </div>
                                                @endif
                                                @if($produtor->nome_filhos)
                                                <div class="col-md-12 mb-2">
                                                    <label class="label-static">Filhos</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->nome_filhos}}</label>
                                                </div>
                                                @endif
                                                <div class="col-md-12 mb-2">
                                                    <label class="label-static">OCS</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->ocs->nome_entidade}}</label>

                                                </div>
                                            </div>
                                            <div style=" margin-top: 10px;">
                                                <div class="inner-aba">
                                                    <label class="">Localização</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Rua</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->nome_rua}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Bairro</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->bairro}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Nº</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->numero_casa}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Cidade</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->cidade}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Estado</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->estado}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">CEP</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->cep}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <label class="label-static">Descricao</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->descricao}}</label>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label class="label-static">Ponto de Referência</label> <br>
                                                    <label class="label-ntstatic">{{$produtor->endereco->ponto_referencia}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($produtor->propriedade)
                                <div id="prop{{$produtor->id}}">
                                    <div class="borda-terra">
                                        <div style="margin-left: 15px; margin-top: 10px;">
                                            <div class="inner-aba">
                                                <label class="">Informações Básicas</label>
                                            </div>
                                        </div>
                                        <div style="margin-left: 15px;">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="label-static required">Tamanho total (Metros)</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->tamanho_total}}</label>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="label-static required">Fonte de Água</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->fonte_de_agua}}</label>
                                                </div>
                                            </div>
                                            <div class="form-row inner-div">
                                                <label class="">Localização</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Rua</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->endereco->rua}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Numero</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->endereco->numero_casa}}</label>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="label-static">Bairro</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->endereco->bairro}}</label>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="label-static required">Cidade</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->endereco->cidade}}</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label class="label-static required">Estado</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->endereco->estado}}</label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label class="label-static required" for="cep">CEP</label><br>
                                                    <label class="label-ntstatic">{{$produtor->propriedade->endereco->cep}}</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="label-static required">Ponto de Referencia</label><br>
                                                <label class="label-ntstatic">{{$produtor->propriedade->endereco->ponto_referencia}}</label>
                                            </div>

                                            <div class="form-group">
                                                <label class="label-static">Descrição</label><br>
                                                <label class="label-ntstatic">{{$produtor->propriedade->endereco->descricao}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="produ{{$produtor->id}}">
                                    <div class="borda-terra">
                                        <div style="margin-left: 15px; margin-top: 10px;">
                                            <div class="inner-aba">
                                                <label class="">Produções</label>
                                            </div>
                                                @if(count($produtor->propriedade->canteirodeproducaos) > 0)
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="nome-col">Nome do produto</th>
                                                            <th scope="col" class="nome-col">Tipo de produção</th>
                                                            <th scope="col" class="nome-col">Data de inicio</th>
                                                            <th scope="col" class="nome-col">Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($produtor->propriedade->canteirodeproducaos as $cant)
                                                        @foreach ($cant->producoes as $prod)
                                                        @foreach ($prod->lista_produtos() as $lis)
                                                        <tr>
                                                            <td class="nome_reuniao basic-space">{{$lis->nome}}</td>
                                                            <td class="nome_reuniao basic-space">{{$prod->tipo_producao}}</td>
                                                            <td class="nome_reuniao basic-space">{{$prod->dataInicioFormatada()}}</td>
                                                            <td id="coluna-images" class="basic-space">
                                                                <a href="{{route('user.canteiroProducao.producao.ver', ['id_producao' => $prod->id])}}"><img id="botao-info" class="imagens-acoes" src="{{asset('images/logo_informacoes.png')}}" alt=""></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @else
                                                <label class="label-static">Nenhuma produção cadastrada!</label><br>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                <br>
                                <div class="form-row">
                                    <div class="col-md-11 mb-3">

                                    </div>
                                    <div class="col-md-1 mb-3">
                                        <a class="btn small-bt bg-cinza" data-dismiss="modal" href="">Voltar</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </td>
            </tr>
                </tbody>
            </table>
            </div>
            <div>
                <hr class="outliner"></hr>
                <div>
                    <label class= "cor-texto" for="">Legenda:</label>
                </div>
                <div class="div-lado">
                    <img id="botao-editar" class="imagens-acoes" src="{{asset('images/person.png')}}" alt="">
                    <label class= "cor-texto" for="">Ver perfil</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
