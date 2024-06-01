<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;

//ROTA CADASTRO DE PRODUTO
Route::get(
    '/cadproduto', [RegisterController::class, 'exibeCadastroProduct']
)->name('cadproduto.get');
Route::post(
    'cadproduto', [RegisterController::class, 'cadastroProduto']
)->name('cadproduto.post');

//ROTAS DE FORNECEDOR
Route::get(
    '/cadfornecedor', [RegisterController::class, 'exibeCadastroFornecedor']
)->name('cadfornecedor.get');
Route::post(
    '/cadfornecedor', [RegisterController::class, 'cadastroFornecedor']
)->name('cadfornecedor.post');
Route::get(
    '/exibefornecedor', [ShowController::class, 'exibeFornecedorCadastrado']
)->name('exibefornecedor.get');

//ROTAS DAS NOTAS FISCAIS
Route::get(
    '/cadnotafiscal', [RegisterController::class, 'exibeCadastroNotaFiscal']
)->name('cadnotafiscal.get');
Route::post(
    '/cadnotafiscal', [RegisterController::class, 'cadastroNotaFiscal']
)->name('cadnotafiscal.post');
Route::get(
    '/exibenotasfiscais', [ShowController::class, 'exibirNotasFiscais']
)->name('exibenotasfiscais.get');

//ROTAS DE COMPRAS
Route::get(
    '/cadprodutocompra', [RegisterController::class, 'exibeCadastroCompra']
)->name('cadastrocompra.get');
Route::post(
    '/cadprodutocompra', [RegisterController::class, 'cadastroDeCompras']
)->name('cadastrocompra.post');

//ROTAS DE ESTOQUE
Route::get(
    '/cadestoque', [RegisterController::class, 'exibeCadastroEstoque']
)->name('cadestoque.get');
Route::post(
    '/cadestoque', [RegisterController::class, 'cadastroEstoque']
)->name('cadestoque.post');
Route::get(
    '/exibeestoque', [ShowController::class, 'exibirEstoque']
)->name('exibeestoque.get');

//ROTAS DE VENDAS
Route::get(
    '/cadprodutovenda', [RegisterController::class, 'exibecadastroVenda']
)->name('cadprodutovenda.get');
Route::post(
    '/cadprodutovenda', [RegisterController::class, 'cadastroDeVendas']
)->name('cadprodutovenda.post');

//ROTAS PAGAMENTO DE CONTAS
Route::get(
    '/cadpagamentocontas', [RegisterController::class, 'exibeCadastroPagamentoContas']
)->name('cadpagamentocontas.get');
Route::post(
    '/cadpagamentocontas', [RegisterController::class, 'cadastroPagamentoContas']
)->name('cadpagamentocontas.post');

//ROTAS IMPOSTO
Route::get(
    '/exibeimposto', [ShowController::class, 'exibeCadastroImposto']
)->name('exibeimposto.get');
Route::post(
    '/exibeimposto', [ShowController::class, 'cadastroImposto']
)->name('exibeimposto.post');

//ROTAS CAIXA
Route::get(
    '/exibecaixa', [ShowController::class, 'exibeCaixa']
)->name('exibecaixa.get');

Route::get(
    '/adicionarInvestimento', [RegisterController::class, 'exibeAdicaoProlabore']
)->name('adicionarInvestimento.get');
Route::post(
    '/adicionarInvestimento', [RegisterController::class, 'cadastraProlabore']
)->name('adicionarInvestimento.post');

//EXIBIR RANZONETE
Route::get(
    '/exibirranzonete', [ShowController::class, 'exibeRanzonete']
)->name('exibirranzonete.get');
Route::post(
    '/exibirranzonete', [ShowController::class, 'exibeRanzonetePorPeriodo']
)->name('exibirranzonete.post');



Route::get('/', [HomeController::class, 'showPageInitial'])->name('/')->Middleware('auth');
/*Route::get('/', function () {
    return view('index');
})->name('inicio');*/

Route::get('login', [AuthController::class, 'login'])->name('login.index');
Route::post('login', [AuthController::class, 'store'])->name('login.store');

Route::get('/logout', [LogoutController::class, 'realizaLogout'])->name('logout');
