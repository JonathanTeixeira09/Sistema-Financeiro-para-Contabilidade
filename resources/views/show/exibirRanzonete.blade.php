@extends('layouts.app')

@section('title', 'Relatório de Balanço')
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

    <form class="row g-2" action="{{ route('exibirranzonete.post') }}" method="POST" name="formCadastro"
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
                        <th style='text-align:left;'>Conta</th>
                        <th>Débito</th>
                        <th>Crédito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='text-align:center;'>
                        <td class='fw-bold' style='text-align:left;'>Capital:</td>
                        <td class='fw' style='text-align:center;'> </td>
                        <td data-title='Imposto Venda'>@isset($capital){{ 'R$ ' . number_format($capital, 2, ',', '.') }}@endisset </td>
                    </tr>
                    <tr style='text-align:center;'>
                        <td class='fw-bold' style='text-align:left;'>Caixa:</td>
                        <td class='fw' style='text-align:center;'>@isset($caixaSaida){{ 'R$ ' . number_format($caixaSaida, 2, ',', '.') }}@endisset</td>
                        <td data-title='Imposto Venda'>@isset($caixaEntrada){{ 'R$ ' . number_format($caixaEntrada, 2, ',', '.') }}@endisset</td>
                    </tr>
                    <tr style='text-align:center;'>
                        <td class='fw-bold' style='text-align:left;'>Mercadorias:</td>
                        <td class='fw' style='text-align:center;'>@isset($estoqueEntrada){{ 'R$ ' . number_format($estoqueEntrada, 2, ',', '.') }}@endisset</td>
                        <td data-title='Imposto Venda'>@isset($estoqueSaida){{ 'R$ ' . number_format($estoqueSaida, 2, ',', '.') }}@endisset</td>
                    </tr>
                    <tr style='text-align:center;'>
                        <td class='fw-bold' style='text-align:left;'>Fornecedores:</td>
                        <td class='fw' style='text-align:center;'>@isset($fornecedoresPago){{ 'R$ ' . number_format($fornecedoresPago, 2, ',', '.') }}@endisset</td>
                        <td data-title='Imposto Venda'>@isset($fornecedoresPagar){{ 'R$ ' . number_format($fornecedoresPagar, 2, ',', '.') }}@endisset</td>
                    </tr>
                    <tr style='text-align:center;'>
                        <td class='fw-bold' style='text-align:left;'>Duplicatas a Receber:</td>
                        <td class='fw' style='text-align:center;'>@isset($duplicatasReceber){{ 'R$ ' . number_format($duplicatasReceber, 2, ',', '.') }}@endisset</td>
                        <td data-title='Imposto Venda'>@isset($duplicatasRecebida){{ 'R$ ' . number_format($duplicatasRecebida, 2, ',', '.') }}@endisset</td>
                    </tr>
                    {{--<tr style='text-align:center;'>
                        <td class='fw-bold' style='text-align:left;'>Total:</td>
                        <td class='fw' style='text-align:center;'>valor 1</td>
                        <td data-title='Imposto Venda'>valor 2</td>--}}
                    </tr>
                </tbody>
            </div>
        </table>
    </div>


</div>
@endsection