@extends('layouts.app')

@section('title', 'Demonstrativo de Imposto')
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

        <form class="row g-2" action="{{ route('exibeimposto.post') }}" method="POST" name="formCadastro"
            enctype="multipart/form-data">
            @csrf

            <div class="col-6">
                <label for="dataInicial" class="form-label">Data Inicial:</label>
                <input type="date" class="form-control @error('dataInicial') is-invalid @enderror"
                    onkeypress="$(this).mask('00/00/0000')" name="dataInicial" placeholder="Data Inicial" tabindex="1">
                @error('dataInicial')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-6">
                <label for="dataFinal" class="form-label">Data Final:</label>
                <input type="date" class="form-control @error('dataFinal') is-invalid @enderror"
                    onkeypress="$(this).mask('00/00/0000')" name="dataFinal" placeholder="Data Final" tabindex="2">
                @error('dataFinal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="col-12">
                <p style="text-align: right;">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" value="cadastrar" tabindex="3">
                        <a class="nav-link text-white">
                            <img src="{{ URL::to('img/icons/check-square-fill.svg') }}" width="20" height="20"
                                class="mb-1">
                            Consultar
                        </a></button>

                </p>
            </div>


        </form>

        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Valor Imposto Compra:</th>
                            <th>Valor Imposto Venda:</th>
                            <th>Total de Imposto a PAGAR:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style='text-align:center;'>
                            <td class='fw' style='text-align:center;'>{{ 'R$ ' . number_format($somaCompra, 2, ',', '.') }}</td>
                            <td data-title='Imposto Venda'>{{ 'R$ ' . number_format($somaVenda, 2, ',', '.') }}</td>
                            <td class='fw-bold'><span class="{{ $total >= 0 ? 'badge rounded-pill bg-danger' : 'badge rounded-pill success' }}">{{ 'R$ ' . number_format($total, 2, ',', '.') }}</span></td>
                        </tr>
                    </tbody>
                </div>
            </table>
        </div>


    </div>
@endsection
