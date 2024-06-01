<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use App\Models\Imposto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function exibeFornecedorCadastrado()
    {
        $fornecedor = DB::table('fornecedors')
            ->select('fornecedors.id as id', 'fornecedors.razaoSocial as nome', 'fornecedors.cnpj as cnpj', 'fornecedors.codArea as cod', 'fornecedors.numero as telefone')
            ->orderBy('nome')
            ->get();

        return view('show/exibeFornecedor', ['fornecedors' => $fornecedor]);
    }

    public function exibirEstoque()
    {

        $estoque = DB::table('estoques')
            ->select('estoques.id as id', 'estoques.nomeProduto as nome', 'estoques.categoriaProduto as categoria', 'estoques.statusEstoque as status')
            ->where('estoques.statusEstoque', '=', 'Ativo')
            ->orderBy('nome')
            ->get();

        return view('show/exibeEstoque', ['estoques' => $estoque]);
    }

    public function exibirNotasFiscais()
    {

        $nota = DB::table('nota_fiscals')
            ->join('fornecedors', 'nota_fiscals.idFornecedor', '=', 'fornecedors.id')
            ->select('nota_fiscals.numeroNota as nrNota', 'nota_fiscals.dataNota as data', 'fornecedors.razaoSocial as nome')
            ->orderBy('nota_fiscals.updated_at')
            ->get();

        return view('show/exibeNotasFiscais', ['nota_fiscals' => $nota]);
    }

    public function exibeCaixa()
    {

        $entrada = 'Entrada';
        $saida = 'Saída';
        // Realize a busca no banco de dados para obter as soma dos valores
        $caixaEntrada = Caixa::where('tipoMovimento', $entrada)->sum('valorMovimento');
        $caixaSaida = Caixa::where('tipoMovimento', $saida)->sum('valorMovimento');
        $total = $caixaEntrada - $caixaSaida;

        return view('show/exibeCaixa', compact('caixaEntrada', 'caixaSaida', 'total'));
    }

    //INICIO CADASTRO IMPOSTO
    public function exibeCadastroImposto()
    {

        $dataInicio = Carbon::now()->toDateString();
        $dataFim = Carbon::now()->toDateString();
        // Realize a busca no banco de dados para obter as soma dos valores
        $somaCompra = Imposto::whereBetween('dataCompra', [$dataInicio, $dataFim])->sum('valorImpostoCompra');
        $somaVenda = Imposto::whereBetween('dataVenda', [$dataInicio, $dataFim])->sum('valorImpostoVenda');
        $total = $somaVenda - $somaCompra;

        return view('show/exibeImposto', compact('somaCompra', 'somaVenda', 'total'));
    }

    public function cadastroImposto(Request $request)
    {

        $validated = $request->validate([
            'dataInicial' => 'required',
            'dataFinal' => 'required',
        ]);

        $dataInicio = $request->input('dataInicial');
        $dataFim = $request->input('dataFinal');

        $somaCompra = Imposto::whereBetween('dataCompra', [$dataInicio, $dataFim])->sum('valorImpostoCompra');
        $somaVenda = Imposto::whereBetween('dataVenda', [$dataInicio, $dataFim])->sum('valorImpostoVenda');
        $total = $somaVenda - $somaCompra;

        return view('show/exibeImposto', compact('somaCompra', 'somaVenda', 'total'));
    }
    //FIM CADASTRO IMPOSTO

    //RANZONETE
    public function exibeRanzonete()
    {
        return view('show/exibirRanzonete');
    }

    public function exibeRanzonetePorPeriodo(Request $request)
    {

        $validated = $request->validate([
            'dataInicial' => 'required',
            'dataFinal' => 'required',
        ]);

        $dataInicio = $request->input('dataInicial');
        $dataFim = $request->input('dataFinal');

        $tipoMovimentoCaixa = 'Entrada';

        //consulta para capital
        $caixaProlabore = Caixa::whereBetween('dataMovimento', [$dataInicio, $dataFim])->where('tipoMovimento', $tipoMovimentoCaixa)->sum('valorMovimento');

        $somaValoresItens = DB::table('compras')
            ->join('estoques', 'estoques.idCompra', '=', 'compras.id')
            ->whereBetween('compras.dataCompra', [$dataInicio, $dataFim])
            ->where('estoques.statusEstoque', 'Ativo')
            ->sum('compras.valorCompra');

        $capital = $caixaProlabore + $somaValoresItens;
        //fim

        //consulta para caixa
        $caixaTipoEntrada = 'Entrada';
        $caixaTipoSaida = 'Saída';
        $caixaEntrada = Caixa::whereBetween('dataMovimento', [$dataInicio, $dataFim])->where('tipoMovimento', $caixaTipoEntrada)->sum('valorMovimento');
        $caixaSaida = Caixa::whereBetween('dataMovimento', [$dataInicio, $dataFim])->where('tipoMovimento', $caixaTipoSaida)->sum('valorMovimento');

        //fim

        //consulta mercadoria
        $estoqueEntrada = DB::table('compras')
            ->join('estoques', 'estoques.idCompra', '=', 'compras.id')
            ->whereBetween('compras.dataCompra', [$dataInicio, $dataFim])
            ->where('estoques.statusEstoque', 'Ativo')
            ->sum('compras.valorCompra');

        $estoqueSaida = DB::table('vendas')
            ->join('estoques', 'estoques.idVenda', '=', 'vendas.id')
            ->whereBetween('vendas.dataVenda', [$dataInicio, $dataFim])
            ->where('estoques.statusEstoque', 'Inativo')
            ->sum('vendas.valorVenda');
        //fim

        //consulta duplicatas
        $duplicatasReceber = DB::table('vendas')
            ->join('duplicatasa_recebers', 'duplicatasa_recebers.idVenda', '=', 'vendas.id')
            ->whereBetween('vendas.dataVenda', [$dataInicio, $dataFim])
            ->where('duplicatasa_recebers.statusDuplicatas', 'Ativa')
            ->sum('vendas.valorVenda');

        $duplicatasRecebida = DB::table('vendas')
            ->join('duplicatasa_recebers', 'duplicatasa_recebers.idVenda', '=', 'vendas.id')
            ->whereBetween('vendas.dataVenda', [$dataInicio, $dataFim])
            ->where('duplicatasa_recebers.statusDuplicatas', 'Inativa')
            ->sum('vendas.valorVenda');

        //consulta de dividas com fornecedores
        $fornecedoresPagar = DB::table('compras')
            ->join('dividas', 'dividas.idCompra', '=', 'compras.id')
            ->whereBetween('compras.dataCompra', [$dataInicio, $dataFim])
            ->where('dividas.statusDivida', 'Ativa')
            ->sum('compras.valorCompra');

        $fornecedoresPago = DB::table('compras')
            ->join('dividas', 'dividas.idCompra', '=', 'compras.id')
            ->whereBetween('compras.dataCompra', [$dataInicio, $dataFim])
            ->where('dividas.statusDivida', 'Inativa')
            ->sum('compras.valorCompra');

        //FIM

        return view('show/exibirRanzonete', compact('capital', 'caixaEntrada', 'caixaSaida', 'estoqueEntrada', 'estoqueSaida', 'duplicatasReceber', 'duplicatasRecebida', 'fornecedoresPagar', 'fornecedoresPago'));
    }

}
