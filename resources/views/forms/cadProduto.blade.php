@extends('layouts.app')

@section('title', 'Cadastro de Produto')
@section('conteudo')

<style>
    @media (max-width: 767px) {
        .table thead {
            display: none;
        }

        .table td {
            display: flex;
            justify-content: space-between;
        }

        .table tr {
            display: block;
        }

        .table td:first-of-type {
            font-weight: bold;
            font-size: 1.2rem;
            text-align: center;
            display: block;
        }

        .table td:not(:first-of-type):before {
            content: attr(data-title);
            display: block;
            font-weight: bold;
        }
    }

</style>

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadproduto.post') }}" method="POST" name="formCadastro"
              enctype="multipart/form-data">
            @csrf

            <div class="col-12">
                <label for="nomeProduto" class="form-label">Nome Produto:</label>
                <input type="text" class="form-control @error('nomeProduto') is-invalid @enderror" name="nomeProduto" placeholder="Nome Produto"
                       tabindex="1">
                @error('nomeProduto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

{{--            <div class="col-md-12">--}}
{{--                <label for="categoriaProduto" class="form-label">Categoria do Produto:</label>--}}
{{--                <select class="form-select" aria-label="Default select example" name="categoriaProduto" tabindex="2">--}}
{{--                    <option selected>Selecione</option>--}}
{{--                    <option value="Consumo">Consumo</option>--}}
{{--                    <option value="Produto">Produto</option>--}}
{{--                    <option value="Serviço">Serviço</option>--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="col-md-12">
                <label for="condicao" class="form-label">Condição do Produto:</label>
                <select class="form-select" name="condicao" tabindex="2" required>
                    <option selected>Selecione</option>
                    <option value="Novo">Novo</option>
                    <option value="Usado">Usado</option>
                    <option value="Não Especificado">Não Especificado</option>
                    <option value="Recondicionado">Recondicioando</option>
                </select>
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar" tabindex="3">
                        <a class="nav-link text-white">
                            <img src="{{ URL::to('img/icons/check-square-fill.svg') }}" width="20" height="20" class="mb-1">
                            Cadastrar
                        </a></button>

                </p>
            </div>


        </form>

        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr>
                            <th>Nome do Produto</th>
                            <!--<th>Id</th>-->
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class='fw-bold'>{{ $product->nomeProduto }}</td>
                                <!--<td data-title='Id'>{{-- $categoria->id --}}</td>-->
                                <td data-title="Ações" style='text-align:right;'>

                                    <a href='{{-- route('editcategoria', $categoria->id) --}}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>

                                    <form action="{{-- route('excluircategoria', $categoria->id) --}}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" value="excluir">Excluir</button>
                                    </form>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($products) == 0)
                <p style="text-align: center;"> Não existe produtos cadastrados no sistema</p>
            @endif
        </div>


    </div>
@endsection
