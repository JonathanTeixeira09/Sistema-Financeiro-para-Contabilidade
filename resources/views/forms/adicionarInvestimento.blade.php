@extends('layouts.app')

@section('title', 'Adicionar Prolabore na Empresa')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="{{route('adicionarInvestimento.post')}}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="valorAdicionado" class="form-label">Informe o valor que deseja adicionar:</label>
                <input type="text" class="form-control @error('valorAdicionado') is-invalid @enderror" name="valorAdicionado"
                    placeholder="Informe o valor" tabindex="1">
                @error('valorAdicionado')
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
