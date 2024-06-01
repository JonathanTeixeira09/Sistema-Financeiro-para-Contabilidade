@extends('layouts.app')

@section('title', 'Cadastro de Produto')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2"  method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf

            <div class="col-md-4">
                <label for="genero" class="form-label">Tipo de Regime Tributário:</label>
                <select class="form-select" aria-label="Default select example" name="genero" tabindex="1">
                    <option selected>Selecione</option>
                    <option value="Simples Nacional">Simples Nacional</option>
                    <option value="Lucro Presumido">Lucro Presumido</option>
                    <option value="Lucro Real">Lucro Real</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="movimento" class="form-label">Tipo de Movimento:</label>
                <select class="form-select" aria-label="Default select example" name="movimento" tabindex="2">
                    <option selected>Selecione</option>
                    <option value="Compra">Compra</option>
                    <option value="Venda">Venda</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="categoriaProduto" class="form-label">Categoria do Produto:</label>
                <select class="form-select" aria-label="Default select example" name="categoriaProduto" tabindex="3">
                    <option selected>Selecione</option>
                    <option value="Alimento">Alimento</option>
                    <option value="Combustivel">Combustivel</option>
                </select>
            </div>


            <div class="col-12">
                <label for="nomeProduto" class="form-label">Nome Produto:</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nomeProduto" placeholder="Nome Produto"
                    tabindex="4">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-3">
                <label for="valorProduto" class="form-label">Valor Compra:</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="valorProduto" placeholder="Valor Produto"
                    tabindex="5">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="icms" class="form-label">ICMS:</label>
                <input type="text" class="form-control" name="icms" tabindex="6">
            </div>
            <div class="col-md-2">
                <label for="cofins" class="form-label">COFINS:</label>
                <input type="text" class="form-control" name="cofins" tabindex="7">
            </div>
            <div class="col-md-2">
                <label for="pis" class="form-label">PIS:</label>
                <input type="text" class="form-control" name="pis" tabindex="8">
            </div>
            <div class="col-md-3">
                <label for="valorVenda" class="form-label">Valor Venda:</label>
                <input type="text" class="form-control" name="valorVenda" tabindex="8">
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar" tabindex="15">Cadastrar</button>
                </p>
            </div>


        </form>
    </div>
@endsection
