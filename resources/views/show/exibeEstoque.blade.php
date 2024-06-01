@extends('layouts.app')

@section('title', 'Listagem de Produtos em Estoque')
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
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Categoria</th>
                        <th style='text-align:right;'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estoques as $estoque)
                        <tr style='text-align:center;'>
                            <td class='fw-bold' style='text-align:left;'>{{ $estoque->nome }}</td>
                            <td data-title='Status'>{{ $estoque->status }}</td>
                            <td data-title='Categoria'>{{ $estoque->categoria }}</td>
                            <td data-titlel="Ações" style='text-align:right;'>

                                <a href='{{-- route('editproduto', $produto->id) --}}'><button type='button'
                                        class='btn btn-sm btn-warning'>Editar</button></a>

                                <form action="{{-- route('excluirprodutoestoque', $produto->id) --}}" method="post"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" value="excluir">Excluir</button>
                                </form>
                    @endforeach
                </tbody>
                <p></p>
                <p></p>
            </div>
        </table>
        @if (count($estoques) == 0)
            <p style="text-align: center;"> Não existe produtos no ESTOQUE.</p>
        @endif
    </div>
@endsection