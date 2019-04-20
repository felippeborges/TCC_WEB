
<?php
session_start();
include '../session.php';
inicializa_sessao("3000", 2);
error_reporting(E_ALL ^ E_NOTICE);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Lista de Produtos </title>

        <?php
        include_once '../config.php';
        include_once '../obter_css.php';
        ?>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="form-group has-success col-xs-4">
                    <p class="lead blog-description"> Lista de Produtos </p>
                </div>

                <table id="tabela" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <td> [Código] - [EAN]</td>
                            <td> Descrição </td>
                            <td> Categoria </td>
                            <td> Fornecedor </td>
                            <td> Custo </td>
                            <td> Preço de venda </td>
                            <td> Estoque </td>
                            <td> Ação </td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                        $produtoBean = new ProdutoBean();
                        $produto = new ProdutoInstance();

                        $produtoBean = $produto->c_buscar_todos_os_produtos();
                        $count = count($produtoBean);

                        foreach ($produtoBean as $mercadoria) {
                            ?>
                        <td><?php echo '[' . $mercadoria->getPrd_codigo() . '] - [' . $mercadoria->getPrd_EAN13() . ']' ?></td>
                        <td><?php echo $mercadoria->getPrd_descricao() ?></td>
                        <td><?php echo $mercadoria->getCat_descricao() ?></td>
                        <td><?php echo $mercadoria->getFor_codigo() ?></td>
                        <td><?php echo 'R$= ' . number_format($mercadoria->getPrd_custo(), 2, ',', '.') ?></td>
                        <td><?php echo 'R$= ' . number_format($mercadoria->getPrd_preco(), 2, ',', '.') ?></td>
                        <td><?php echo $mercadoria->getPrd_quantidade() ?></td>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
