<?php
include_once '../session.php';
inicializa_sessao('300', 2);
error_reporting(E_ALL ^ E_NOTICE);

require_once '../../include/auto_load_path_2.php';

$categoria = new CategoriasInstance();
$categoriaBean = new CategoriasBean();

$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");
$codigo = (isset($_POST["cat_codigo"])) ? $_POST["cat_codigo"] : ((isset($_GET["cat_codigo"])) ? $_GET["cat_codigo"] : 0);

if ($codigo > 0) {
    // buscar o cliente com o codigo do cliente;
    $categoriaBean = $categoria->c_buscaCategoriasPorCodigo($codigo);
}

if ($acao != "") {
    if ($acao == "incluir") {
        $categoria->c_gravarCategorias();
        header("Location:listar_categorias.php");
    }

    if ($acao == "alterar") {
        $categoria->c_alterarCategorias();
        header("Location:listar_categorias.php");
    }

    if ($acao == "excluir") {
        $categoria->c_excluirCategorias();
        header("Location:listar_categorias.php");
    }
}
?>

<!doctype html>
<html lang="pt_Br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <?php
        include_once '../obter_css.php';
        ?>
        <title></title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    </head>
    <body>
        <form action="CadastroCategorias.php" method="post">

            <input type="hidden" name="acao" value="<?php echo ($codigo > 0) ? "alterar" : "incluir" ?>"  />

            <input hidden="" name="cat_codigo" value="<?php echo $categoriaBean->getCat_codigo() ?>"  />

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1"> Código </label>
                    <input disabled="" type="text" name="cat_codigo" class="form-control" value="<?php echo $categoriaBean->getCat_codigo() ?>" id="inputError1">
                </div>
               

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Descrição</label>
                    <input required type="text" name="cat_descricao" class="form-control" value="<?php echo $categoriaBean->getCat_descricao() ?>" id="inputError1">
                </div>

            </div>
            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"> <i class="<?php echo ($codigo > 0) ? "fas fa-user-edit" : "fa fa-floppy-o" ?>"></i> <?php echo ($codigo > 0) ? "Gravar Alteração" : "Gravar Registro" ?> </button>
            </div>


        </form>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
