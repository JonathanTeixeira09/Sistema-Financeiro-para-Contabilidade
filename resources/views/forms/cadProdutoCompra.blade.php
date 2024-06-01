@extends('layouts.app')

@section('title', 'Cadastrar Compra de Produto')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2"  method="POST" action="{{ route('cadastrocompra.post') }}" name="formCadastro"
              enctype="multipart/form-data">
            @csrf

            <div class="col-md-4">
                <label for="idNotaFiscal" class="form-label">Nr Nota Fiscal:</label>
                    <select class="form-select" name="idNotaFiscal" tabindex="1" required>
                        <option selected>Selecione</option>
                        @foreach ($nota_fiscals as $notafiscal)
                            <option value="{{ $notafiscal->id }}">
                                {{ $notafiscal->numeroNota }}
                            </option>
                        @endforeach
                    </select>
            </div>
            <div class="col-md-8">
                <label for="idProduto" class="form-label">Nome do Produto:</label>
                    <select class="form-select" name="idProduto" tabindex="2" required>
                        <option selected>Selecione</option>
                        @foreach ($produtos as $produto)
                            <option value="{{ $produto->id }}">
                                {{ $produto->nomeProduto }}
                            </option>
                        @endforeach
                    </select>
            </div>

            <div class="col-4">
                <label for="valorCompra" class="form-label">Preço da compra do Produto:</label>
                <input type="text" class="form-control @error('valorCompra') is-invalid @enderror" name="valorCompra"  placeholder="Valor Compra"
                       tabindex="3">
                @error('valorCompra')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-4">
                <label for="dataCompra" class="form-label">Data Compra:</label>
                <input type="text" class="form-control @error('dataCompra') is-invalid @enderror" name="dataCompra" onkeypress="$(this).mask('00/00/0000')" placeholder="Data Compra"
                       tabindex="4">
                @error('dataCompra')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="tipoCompra" class="form-label">Tipo de Compra:</label>
                <select class="form-select" name="tipoCompra" tabindex="5">
                    <option selected>Selecione</option>
                    <option value="Crédito">Crédito</option>
                    <option value="Débito">Débito</option>
                </select>
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar" tabindex="6">
                        <a class="nav-link text-white">
                            <img src="{{ URL::to('img/icons/check-square-fill.svg') }}" width="20" height="20" class="mb-1">
                            Cadastrar
                        </a></button>

                </p>
            </div>


        </form>
    </div>
@endsection
