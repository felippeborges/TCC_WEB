
<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sistema De vendas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Cadastros <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Administração</li>
                        <li><a target="Frame1" href="Usuarios/CadastroUsuarios.php"><i class="fa fa-user-plus" aria-hidden="true"></i>  Usuários</a></li>

                        <li><a target="Frame1"href="Clientes/CadastroClientes.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Clientes </a></li>
                        <li><a target="Frame1" href="Produtos/CadastroProdutos.php"><i class="fas fa-shopping-basket"></i></i> Produtos </a></li>
                        <li><a target="Frame1" href="Fornecedores/CadastroFornecedores.php"><i class="fas fa-address-card"></i> Fornecedores </a></li>
                        <li><a target="Frame1" href="Categorias/CadastroCategorias.php"><i class="fas fa-shopping-basket"></i> Fornecedores </a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-folder" aria-hidden="true"></i> Listagem <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Administração</li>

                        <li><a target="Frame1"href="Usuarios/listar_usuarios.php"><i class="fas fa-list-ul"></i> Listar Usuários </a></li>

                        <li><a target="Frame1" href="Clientes/listar_clientes.php"><i class="fas fa-list-ul"></i> Listar Clientes </a></li>
                        <li><a target="Frame1" href="Produtos/listar_produtos.php"><i class="fas fa-list-ul"></i> Produtos </a></li>
                        <li><a target="Frame1" href="Fornecedores/listar_fornecedores.php"><i class="fas fa-list-ul"></i> Fornecedores </a></li>
                        <li><a target="Frame1" href="Categorias/listar_categorias.php"><i class="fas fa-list-ul"></i> Fornecedores </a></li>
                    </ul>
                </li>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i> Configurações <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a target="Frame1" href="Usuarios/CadastroUsuarios.php"><i class="fa fa-cog" aria-hidden="true"></i>  Alterar senha </a></li>
                        <li><a target="Frame1"href="Clientes/CadastroClientes.php"><i class="fa fa-cog" aria-hidden="true"></i> Logoff </a></li>

                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

