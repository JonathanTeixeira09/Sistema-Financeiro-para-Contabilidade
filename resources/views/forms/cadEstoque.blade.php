@extends('layouts.app')

@section('title', 'Cadastro de Produto em Estoque')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2"  method="POST" action="{{ route('cadestoque.post') }}" name="formCadastro"
              enctype="multipart/form-data">
            @csrf

            <div class="col-md-7">
                <label for="idCompra" class="form-label">Nome do Produto:</label>
                    <select class="form-select" name="idCompra" tabindex="1" required>
                        <option selected>Selecione</option>
                        @foreach ($compras as $compra)
                            <option value="{{ $compra->id }}">
                                {{ $compra->nomeProduto }}
                            </option>
                        @endforeach
                    </select>
            </div>

            <div class="col-md-5">
                <label for="categoriaProduto" class="form-label">Categoria do Produto:</label>
                <select class="form-select"  name="categoriaProduto" tabindex="2">
                    <option selected>Selecione</option>
                    <option value="Consumo">Consumo</option>
                    <option value="Produto">Produto</option>
                    <option value="Serviço">Serviço</option>
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
    </div>
@endsection
