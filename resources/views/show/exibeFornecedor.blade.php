@extends('layouts.app')

@section('title', 'Listagem de Fornecedores')
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

    <div class="col-md-10  mx-auto justify-content-center align-items-center flex-column">
        <div class="col-md-12 mx-auto justify-content-center align-items-center flex-column">
            <table class="table table-striped table-md">
                <div class="table-responsive">
                    <thead>
                        <tr style='text-align:center;'>
                            <th>Nome Fornecedor</th>
                            <!--<th>Id</th>-->
                            <th>CNPJ</th>
                            <th>Cod Area</th>
                            <th>Telefone</th>
                            <th style='text-align:right;'>Ações</th>
                        </tr>
                    </thead>
                    <tbody style='text-align:center;'>
                        @foreach ($fornecedors as $fornecedor)
                            <tr>
                                <td class='fw-bold'>{{ $fornecedor->nome }}</td>
                                <!--<td data-title='Id'>{{-- $fornecedor->id --}}</td>-->
                                <td data-title='CNPJ'>{{ $fornecedor->cnpj }}</td>
                                <td data-title='Cod Area'>{{ $fornecedor->cod }}</td>
                                <td data-title='Telefone'>{{ $fornecedor->telefone }}</td>
                                <td data-title="Ações" style='text-align:right;'>
                                    <a href='{{-- route('editfornecedor', $fornecedor->id) --}}'><button type='button'
                                            class='btn btn-sm btn-warning'>Editar</button></a>

                                    <form action="{{-- route('excluirfornecedor', $fornecedor->id) --}}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            value="excluir">Excluir</button>
                                    </form>
                        @endforeach
                    </tbody>
                </div>
            </table>
            @if (count($fornecedors) == 0)
                <p style="text-align: center;"> Não existe fornecedores cadastrados no sistema</p>
            @endif
        </div>
    </div>

@endsection
