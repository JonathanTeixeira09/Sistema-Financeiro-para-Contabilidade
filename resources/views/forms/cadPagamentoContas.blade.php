@extends('layouts.app')

@section('title', 'Pagamento de contas Mensais')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadpagamentocontas.post') }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf

            <div class="col-3">
                <label for="dataPagamento" class="form-label">Data Pagamento:</label>
                <input type="text" class="form-control @error('dataPagamento') is-invalid @enderror" name="dataPagamento"
                    onkeypress="$(this).mask('00/00/0000')" placeholder="Data pagamento" tabindex="1">
                @error('dataPagamento')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-3">
                <label for="valorPagamento" class="form-label">Inserir Valor Pagamento:</label>
                <input type="text" class="form-control @error('valorPagamento') is-invalid @enderror"
                    name="valorPagamento" placeholder="Valor Pagamento" tabindex="2">
                @error('valorPagamento')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="descricao" class="form-label">Descrição do Pagamento:</label>
                <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao"
                    placeholder="Razão Social" tabindex="3">
                @error('descricao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar" tabindex="4">
                        <a class="nav-link text-white">
                            <img src="{{ URL::to('img/icons/check-square-fill.svg') }}" width="20" height="20"
                                class="mb-1">
                            Cadastrar
                        </a></button>

                </p>
            </div>
        </form>
    </div>
@endsection
