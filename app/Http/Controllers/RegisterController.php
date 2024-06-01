<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\NotaFiscal;
use App\Models\Compra;
use App\Models\Divida;
use App\Models\Caixa;
use App\Models\Estoque;
use App\Models\Imposto;
use App\Models\Venda;
use App\Models\PagamentosConta;
use App\Models\DuplicatasaReceber;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    //Controle de Cadastro 

    //CADASTRO DE PRODUTO
    public function exibeCadastroProduct(){
        $product = Produto::orderby('nomeProduto')->get();

        return view('forms/cadProduto', ['products' => $product]);
    }

    public function cadastroProduto(Request $request){

        $validated = $request->validate([
            'nomeProduto' => 'required|max:200',
            'condicao' => 'required',
        ]);

        $product = new Produto();
        $product->nomeProduto = $request->input('nomeProduto');
        $product->condicao = $request->input('condicao');

        $product->save();

        flash('Produto adicionado com Sucesso!')->success();
        return redirect()->route('cadproduto.get');
    }
    // FIM DO CADASTRO DO PRODUTO

    //CADASTRO DE FORNECEDOR

    public function exibeCadastroFornecedor(){
        return view('forms/cadFornecedor');
    }

    public function cadastroFornecedor(Request $request){

        $validated = $request->validate([
            'razaoSocial' => 'required|max:200',
            'cnpj' => 'required|unique:fornecedors',
        ]);

        $fornecedor = new Fornecedor($request->all());
        $fornecedor->save();

        flash('Fornecedor cadastrado com sucesso!')->success();
        return redirect()->route('cadfornecedor.get');

    }

    // FIM DO CADASTRO DO FORNECEDOR

    //CADASTRO DE NOTA FISCAL
    public function exibeCadastroNotaFiscal(){
        
        $fornecedor = Fornecedor::orderBy('razaoSocial')->get();

        return view('forms/cadNotaFiscal' , ['fornecedors' => $fornecedor]);
    }

    public function cadastroNotaFiscal(Request $request){

        $validated = $request->validate([
            'numeroNota' => 'required|max:100',
            'dataNota' => 'required',
            'idFornecedor' => 'required',
        ]); 
        
        $nota = new NotaFiscal();
        $nota->numeroNota = $request->input('numeroNota');
        $nota->idFornecedor = $request->input('idFornecedor');
        $nota-> dataNota= Carbon::createFromFormat('d/m/Y', $request->input('dataNota'))->format('Y/m/d');

        $nota->save();
        

        flash('Nota Fiscal cadastrada com sucesso!')->success();
        return redirect()->route('cadnotafiscal.get');


    }
    // FIM DO CADASTRO DE NOTA FISCAL

    //CADASTRO DE COMPRA

    public function exibeCadastroCompra(){
        $notaFiscal = NotaFiscal::orderBy('created_at','desc')->get();
        $produto = Produto::orderBy('nomeProduto')->get();

        return view('forms/cadProdutoCompra', ['nota_fiscals' => $notaFiscal, 'produtos' => $produto]);
    }

    public function cadastroDeCompras(Request $request){

        $validated = $request->validate([
            'dataCompra' => 'required',
            'valorCompra' => 'required',
            'idProduto' => 'required',
        ]);



        $compra = new Compra();
        $produto = $request->input('idProduto');
        $nomeProduto = DB::table('produtos')
                        ->select('produtos.nomeProduto as nome')
                        ->where('id', '=', $produto)
                        ->first();
        $compra->nomeProduto = $nomeProduto->nome;
        $compra->valorCompra = str_replace(",",".", $request->input('valorCompra'));
        $compra->dataCompra = Carbon::createFromFormat('d/m/Y', $request->input('dataCompra'))->format('Y/m/d');
        $compra->tipoCompra = $request->input('tipoCompra');
        $compra->valorImposto = number_format(((float)$compra->valorCompra * 0.17), 2, '.','');
        $compra->idProduto = $request->input('idProduto');        
        $compra->idNotaFiscal = $request->input('idNotaFiscal');

        $compra->save();

        if($request->input('tipoCompra') != 'Débito'){
            $divida = new Divida();
            $divida->valorDivida = str_replace(",",".", $request->input('valorCompra'));
            $divida->dataDivida = Carbon::createFromFormat('d/m/Y', $request->input('dataCompra'))->format('Y/m/d');
            $divida->descricaoDivida = $nomeProduto->nome;
            $divida->statusDivida = 'Ativa';
            $divida->idCompra = $compra->id;

            $divida->save();
        }else {
            $caixa = new Caixa();
            $caixa->descricao = $nomeProduto->nome;
            $caixa->tipoMovimento = 'Saída';
            $caixa->valorMovimento = str_replace(",",".", $request->input('valorCompra'));
            $caixa->dataMovimento = Carbon::createFromFormat('d/m/Y', $request->input('dataCompra'))->format('Y/m/d');

            $caixa->save();
        }

        $imposto = new Imposto();
        $imposto->valorImpostoCompra = number_format(((float)$compra->valorCompra * 0.17), 2, '.','');
        $imposto->dataCompra = Carbon::createFromFormat('d/m/Y', $request->input('dataCompra'))->format('Y/m/d');
        $imposto->idCompra = $compra->id;
        $imposto->save();
        

        flash('Produto cadastro a nota fiscal pronto para ser cadastrado em ESTOQUE.')->success();
        return redirect()->route('cadestoque.get');

    }

    //FIM DO CADASTRO DE COMPRA

    //CADASTRO ESTOQUE
    public function exibeCadastroEstoque(){
        $compra = Compra::orderby('nomeProduto')->get();

        return view('forms/cadEstoque', ['compras' => $compra]);
    }

    public function cadastroEstoque(Request $request){

        $estoque = new Estoque();
        $estoque->categoriaProduto = $request->input('categoriaProduto');
        $estoque->statusEstoque = 'Ativo';
        $compra = $request->input('idCompra');
        $nomeProduto = DB::table('compras')
                        ->select('compras.nomeProduto as nome')
                        ->where('id', '=', $compra)
                        ->first();
        $estoque->nomeProduto = $nomeProduto->nome;
        $estoque->idCompra = $request->input('idCompra');

        $estoque->save();

        flash('Produto cadastrado em ESTOQUE.')->success();
        return redirect()->route('cadestoque.get');

    }

    //FIM CADASTRO ESTOQUE

    //INICIO CADASTRO VENDAS

    public function exibecadastroVenda(){
        $estoque = Estoque::orderby('nomeProduto')->where('statusEstoque', '=', 'Ativo')->get();

        return view('forms/cadProdutoVenda', ['estoques' => $estoque]);
    }

    public function cadastroDeVendas(Request $request){

        $validated = $request->validate([
            'valorVenda' => 'required',
        ]);

        $vendas = new Venda();
        $venda = $request->input('idEstoque');
        $nomeProduto = DB::table('estoques')
                        ->select('estoques.nomeProduto as nome', 'estoques.idCompra as compra')
                        ->where('id', '=', $venda)
                        ->first();
        $vendas->nomeProduto = $nomeProduto->nome;
        $vendas->valorVenda = str_replace(",",".", $request->input('valorVenda'));
        $vendas->dataVenda = Carbon::createFromFormat('d/m/Y', $request->input('dataVenda'))->format('Y/m/d');
        $vendas->tipoVenda = $request->input('tipoVenda');
        $vendas->valorImposto = number_format(((float)$vendas->valorVenda * 0.17), 2, '.','');

        $vendas->save();

        if($request->input('tipoVenda') != 'Débito'){
            
            $duplicatas = new DuplicatasaReceber();
            $duplicatas->valorMovimento = str_replace(",",".", $request->input('valorVenda'));
            $duplicatas->dataMovimento = Carbon::createFromFormat('d/m/Y', $request->input('dataVenda'))->format('Y/m/d');
            $duplicatas->statusDuplicatas = 'Ativa';
            $duplicatas->idVenda = $vendas->id;

            $duplicatas->save();
        }else {
            $caixa = new Caixa();
            $caixa->descricao = $nomeProduto->nome;
            $caixa->tipoMovimento = 'Entrada';
            $caixa->valorMovimento = str_replace(",",".", $request->input('valorVenda'));
            $caixa->dataMovimento = Carbon::createFromFormat('d/m/Y', $request->input('dataVenda'))->format('Y/m/d');

            $caixa->save();
        }

        Estoque::where('id', $request->input('idEstoque'))->update(['idVenda' => $vendas->id, 'statusEstoque' => 'Inativo' ]);
        Imposto::where('idCompra', $nomeProduto->compra)->update(['valorImpostoVenda' => $vendas->valorImposto, 'idVenda' => $vendas->id, 'dataVenda' => $vendas->dataVenda]);

        flash('Venda finalizada com sucesso.')->success();
        return redirect()->route('cadprodutovenda.get');

    }

    //FIM CADASTRO VENDAS


    //INICIO CADASTRO DE PAGAMENTO DE CONTAS
    public function exibeCadastroPagamentoContas(){
        return view('forms/cadPagamentoContas');
    }

    public function cadastroPagamentoContas(Request $request){

        $validated = $request->validate([
            'valorPagamento' => 'required',
        ]);

        $pagamento = new PagamentosConta();
        $pagamento->descricao = $request->input('descricao');
        $pagamento->dataPagamento = Carbon::createFromFormat('d/m/Y', $request->input('dataPagamento'))->format('Y/m/d');
        $pagamento->valorPagamento = str_replace(",",".", $request->input('valorPagamento'));

        $pagamento->save();

        $caixa = new Caixa();
        $caixa->descricao = $pagamento->descricao;
        $caixa->tipoMovimento = 'Saida';
        $caixa->valorMovimento = str_replace(",",".", $request->input('valorPagamento'));
        $caixa->dataMovimento = Carbon::createFromFormat('d/m/Y', $request->input('dataPagamento'))->format('Y/m/d');

        $caixa->save();

        flash('Pagamento de Conta realizado com sucesso')->success();
        return redirect()->route('cadpagamentocontas.get');

    }

    //FIM CADASTRO PAGAMENTO CONTAS

    
    //CAIXA
    public function exibeAdicaoProlabore(){
        return view('forms/adicionarInvestimento');
    }

    public function cadastraProlabore(Request $request){
        $validated = $request->validate([
            'valorAdicionado' => 'required',
        ]);

        $dataAtual = Carbon::now()->toDateString();

        $caixa = new Caixa();
        $caixa->descricao = 'Valor adicionado ao caixa da empresa';
        $caixa->tipoMovimento = 'Entrada';
        $caixa->valorMovimento = str_replace(",",".", $request->input('valorAdicionado'));
        $caixa->dataMovimento = $dataAtual;

        $caixa->save();

        flash('Valor adicionado com SUCESSO!')->success();
        return redirect()->route('adicionarInvestimento.get');
    }
    
}

