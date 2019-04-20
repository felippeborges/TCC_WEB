<?php

session_start();
include_once '../session.php';
inicializa_sessao('300', 2);
error_reporting(E_ALL ^ E_NOTICE);

require_once '../../include/auto_load_path_2.php';

$categoria = new CategoriasInstance();
$categoriaBean = new CategoriasBean();
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title></title>
        <?php
        include_once '../obter_css.php';
        ?>

    </head>

    <body>

        <br/>
        <div class="container">
            <div class="row">

                <div class="form-group has-success  col-xs-6">
                    <p class="lead blog-description">Lista de Categorias</p>
                </div>
                <table id="tabela" class="table table-condensed table-hover">


                    <thead>
                        <tr>
                            <td >código</td>
                            <td >nome categoria</td>
                            <td >Ação</td>
                        </tr>

                    </thead> 
                    <tbody>
                        <?php
                        $categoriaBean = $categoria->c_buscaTodasCategorias();
                        $cont = count($categoriaBean);
                        foreach ($categoriaBean as $category) {
                            ?>
                            <tr>
                                <td><?php echo $category->getCat_codigo() ?></td>
                                <td><?php echo $category->getCat_descricao() ?> </td>
                                <td><a href="CadastroCategorias.php?cat_codigo=<?php echo $category->getCat_codigo()?>"><i class="fas fa-user-edit"></i> </a> | <a href="javascript: if(confirm('Deseja Excluir a categoria <?php echo $category->getCat_descricao()?>')){location='CadastroCategorias.php?acao=excluir&cat_codigo= <?php echo $category->getCat_codigo()?>';}"><i class="fas fa-trash-alt"></i> </a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="alert alert-success">
                    <strong><?php echo 'foram encontrados '.$cont . ' categoria(s).' ?></strong>
                </div>
        </div>

</html>
