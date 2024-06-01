@extends('layouts.app')

@section('title', 'Retirada de Valores')
@section('conteudo')

    <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">

        <form class="row g-2" action="#" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="valorRetirado" class="form-label">Informe o valor que deseja ser retirado:</label>
                <input type="text" class="form-control @error('valorRetirado') is-invalid @enderror" name="valorRetirado"
                    placeholder="Informe o valor" tabindex="1">
                @error('valorRetirado')
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
