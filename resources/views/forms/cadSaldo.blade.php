@extends('layouts.app')

@section('title', 'Cadastrar entrada de Valores')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="#" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="valorAdicionado" class="form-label">Valor a ser adicionado:</label>
                <input type="text" class="form-control @error('razaoSocial') is-invalid @enderror" name="valorAdicionado"
                    placeholder="Valor" tabindex="1">
                @error('razaoSocial')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-success btn-block" value="cadastrar">Cadastrar</button>
                </p>
            </div>
        </form>
    </div>
@endsection
