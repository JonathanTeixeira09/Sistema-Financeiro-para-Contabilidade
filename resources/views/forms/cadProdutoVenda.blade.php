@extends('layouts.app')

@section('title', 'Cadastrar Venda de Produto')
@section('conteudo')


    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2"  method="POST" name="formCadastro"
              enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
                <label for="idEstoque" class="form-label">Nome do Produto:</label>
                    <select class="form-select" name="idEstoque" tabindex="1" required>
                        <option selected>Selecione</option>
                        @foreach ($estoques as $estoque)
                            <option value="{{ $estoque->id }}">
                                {{ $estoque->nomeProduto }}
                            </option>
                        @endforeach
                    </select>
            </div>

            <div class="col-6">
                <label for="valorVenda" class="form-label">Preço de venda:</label>
                <input type="text" class="form-control @error('valorVenda') is-invalid @enderror" name="valorVenda" placeholder="Preço da venda do produto"
                       tabindex="2">
                @error('valorVenda')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-6">
                <label for="dataVenda" class="form-label">Data Venda do Produto:</label>
                <input type="text" class="form-control @error('dataVenda') is-invalid @enderror" onkeypress="$(this).mask('00/00/0000')" name="dataVenda" placeholder="Data Venda"
                       tabindex="3">
                @error('dataVenda')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="tipoVenda" class="form-label">Tipo de Venda:</label>
                <select class="form-select" name="tipoVenda" tabindex="4">
                    <option selected>Selecione</option>
                    <option value="Crédito">Crédito</option>
                    <option value="Débito">Débito</option>
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
