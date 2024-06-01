@extends('layouts.app')

@section('title', 'Cadastrar Nota Fiscal')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{ route('cadnotafiscal.post') }}" method="POST" name="formCadastro"
              enctype="multipart/form-data">
            @csrf
            <div class="col-md-3">
                <label for="numeroNota" class="form-label">Número da Nota Fiscal:</label>
                <input type="text" class="form-control @error('numeroNota') is-invalid @enderror" name="numeroNota"
                       placeholder="Informe NR da Nota" tabindex="1">
                @error('numeroNota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="idFornecedor" class="form-label">Nome do Fornecedor</label>
                    <select class="form-select" name="idFornecedor" tabindex="2" required>
                        <option selected>Selecione</option>
                        @foreach ($fornecedors as $fornecedor)
                            <option value="{{ $fornecedor->id }}">
                                {{ $fornecedor->razaoSocial }}
                            </option>
                        @endforeach
                    </select>
            </div>
            <div class="col-3">
                <label for="dataNota" class="form-label">Data Compra:</label>
                <input type="text" class="form-control @error('dataNota') is-invalid @enderror" name="dataNota" onkeypress="$(this).mask('00/00/0000')" placeholder="Data Nota"
                       tabindex="3">
                @error('dataNota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar" tabindex="4">
                        <a class="nav-link text-white">
                            <img src="{{ URL::to('img/icons/check-square-fill.svg') }}" width="20" height="20" class="mb-1">
                            Cadastrar
                        </a></button>

                </p>
            </div>
        </form>
    </div>
@endsection
