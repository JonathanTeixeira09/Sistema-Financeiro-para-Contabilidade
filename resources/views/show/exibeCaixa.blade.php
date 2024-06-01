@extends('layouts.app')

@section('title', 'Caixa')
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

    <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
        <table class="table table-striped table-md">
            <div class="table-responsive">
                <thead>
                    <tr style='text-align:center;'>
                        <th>Caixa Entrada:</th>
                        <th>Caixa Saída:</th>
                        <th>Total em Caixa:</th>
                    </tr>
                </thead>
                <tbody>
                        <tr style='text-align:center;'>
                            <td class='fw' style='text-align:center;'>{{ 'R$ ' . number_format($caixaEntrada, 2, ',', '.') }}</td>
                            <td data-title='Saída'>{{ 'R$ ' . number_format($caixaSaida, 2, ',', '.') }}</td>
                            <td class='fw-bold' data-title='Total'>{{ 'R$ ' . number_format($total, 2, ',', '.') }}</td>
                        </tr>
                </tbody>
                <p></p>
                <p></p>
            </div>
        </table>
    </div>
@endsection
