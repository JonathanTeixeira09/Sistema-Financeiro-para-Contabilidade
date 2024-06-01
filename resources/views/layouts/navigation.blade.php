<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="{{ URL::to('img/logo.png') }}" alt="Inicio" width="130" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('/') }}">
                        <img src="{{ URL::to('img/icons/home.svg') }}" width="20" height="20" class="mb-1">
                        Inicio
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL::to('img/icons/estoque.svg') }}" width="20" height="20" class="mb-1">
                        Produtos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem de Produtos</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadproduto.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Produto</a></li>
                        <li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadastrocompra.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Compra</a></li>
                        <li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadestoque.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Produto em Estoque</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadprodutovenda.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Venda</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Relatórios</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL::to('img/icons/fornecedor.svg') }}" width="20" height="20"
                            class="mb-1">
                        Fornecedores
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="{{ route('exibefornecedor.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Listagem de Fornecedores</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadfornecedor.get') }}"><img
                                    src="{{ URL::to('img/icons/cad_prod2.svg') }}" width="20" height="20"
                                    class="mb-1"> Cadastrar Fornecedores</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL::to('img/icons/file-bar-graph.svg') }}" width="20" height="20"
                            class="mb-1">
                        Notas
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="{{ route('exibenotasfiscais.get') }}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Relatórios Notas</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadnotafiscal.get') }}"><img
                                    src="{{ URL::to('img/icons/file-bar-graph.svg') }}" width="20"
                                    height="20" class="mb-1"> Cadastrar Nota</a></li>

                        <!--<li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/file-bar-graph.svg') }}" width="20" height="20"
                                    class="mb-1"> Consultar Notas</a></li>-->
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL::to('img/icons/wallet-fill.svg') }}" width="20" height="20"
                            class="mb-1">
                        Caixa
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown04">
                        <li><a class="dropdown-item text-white" href="{{ route('exibecaixa.get')}}"><img
                                    src="{{ URL::to('img/icons/search_w.svg') }}" width="20" height="20"
                                    class="mb-1"> Saldo em Caixa</a></li>
                        <li><a class="dropdown-item text-white" href="{{route('adicionarInvestimento.get')}}"><img
                                    src="{{ URL::to('img/icons/cash.svg') }}" width="20" height="20"
                                    class="mb-1"> Adicionar Saldo</a></li>

                        <li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/cash.svg') }}" width="20" height="20"
                                    class="mb-1"> Retirada de Prolabore</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('cadpagamentocontas.get') }}"><img
                                    src="{{ URL::to('img/icons/cash-coin.svg') }}" width="20" height="20"
                                    class="mb-1"> Pagamento de Contas</a></li>
                        <li><a class="dropdown-item text-white" href="#"><img
                                    src="{{ URL::to('img/icons/cash-coin.svg') }}" width="20" height="20"
                                    class="mb-1"> Pagamento de Dívidas</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('exibeestoque.get') }}">
                        <img src="{{ URL::to('img/icons/box-seam.svg') }}" width="20" height="20"
                            class="mb-1">
                        Estoque
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('exibeimposto.get') }}">
                        <img src="{{ URL::to('img/icons/building.svg') }}" width="20" height="20"
                            class="mb-1">
                        Imposto
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{route('exibirranzonete.get')}}">
                        <img src="{{ URL::to('img/icons/bar-chart-line.svg') }}" width="20" height="20"
                            class="mb-1">
                        Ranzonete
                    </a>
                </li>

            </ul>

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ URL::to('img/logo2.png') }}" alt="usuario" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>{{ Auth::user()->email }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <!--<li><a class="dropdown-item text-white" href="#">Perfil</a></li>-->
                    <li><a class="dropdown-item text-white" href="{{-- route('editusuario', Auth::user()->id) --}}">Editar Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-white" href="{{ route('logout') }}">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
