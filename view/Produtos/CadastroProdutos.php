<?php
session_start();
include_once '../session.php';
inicializa_sessao('3000', 2);
error_reporting(E_ALL ^ E_NOTICE);

require_once '../../include/auto_load_path_2.php';

$produto = new ProdutoInstance();
$produtoBean = new ProdutoBean();

$categoria = new CategoriasInstance();
$categoriaBean = new CategoriasBean();

$fornecedor = new ProdutoInstance();
$fornecedorBean = new FornecedoresBean();



$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
$codigo = (isset($_POST["prd_codigo"])) ? $_POST["prd_codigo"] : ((isset($_GET["prd_codigo"])) ? $_GET["prd_codigo"] : 0 );

if ($codigo > 0) {
    // buscar o cliente com o codigo do produto;
}

if ($acao != "") {
    if ($acao == "incluir") {
        //ação para cadastrar o produto;
        $produto->c_gravar_produtos();
        echo " GRAVADO COM SUCESSO";
    }
    if ($acao == "editar") {
        //ação para alterar o produto;
    }
    if ($acao == "excluir") {
        //ação para excluir o produto
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title></title>
    </head>
    <body>
        <form action="CadastroProdutos.php" method="post">

            <input type="hidden" name="acao" value="<?php echo ($codigo > 0) ? "editar" : "incluir" ?>"  />

            <input hidden="" name="prd_codigo" value="<?php echo $produtoBean->getPrd_codigo() ?>"  />

            <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Código do Produto</label>
                        <input disabled type="text" class="form-control" id="validationDefault01" placeholder="código do produto" value="<?php $produtoBean->getPrd_codigo() ?>" name="prd_codigo">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Código EAN-13</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="código GTIN/EAN" value="<?php $produtoBean->getPrd_EAN13() ?>" name="prd_EAN13" maxlength="13" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationDefaultUsername"> Descrição </label>
                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Descrição do produto" aria-describedby="inputGroupPrepend2" required value="<?php $produtoBean->getPrd_descricao() ?>" name="prd_descricao">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="control-label" for="inputSucess1"> Categoria </label>
                        <select class="form-control" name="cat_codigo">
                            <?php
                            $categoriaBean = $categoria->c_buscaTodasCategorias();
                            foreach ($categoriaBean as $category) {
                                ?>
                            <option <?php echo ($categoriaBean->getCat_codigo() == $category->getCat_codigo()) ? "selected" : ""?> value=" <?php echo $category->getCat_codigo() ?> " > <?php echo $category->getCat_descricao() ?> </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="validationDefault03"> Unidade de medida</label>
                        <select class="form-control input-sm" name="prd_unmedida">
                            <option<?php echo ("" == "UN") ? "selected" : "" ?> value="UN">Unidade</option>
                            <option<?php echo ("" == "CX") ? "selected" : "" ?> value="CX">Caixa</option>
                            <option<?php echo ("" == "LT") ? "selected" : "" ?> value="LT">Litro</option>
                            <option<?php echo ("" == "KG") ? "selected" : "" ?> value="KG">Kilo</option>
                            <option<?php echo ("" == "G") ? "selected" : "" ?> value="G">Grama</option>
                        </select>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault04">Custo</label>
                        <input type="text" class="form-control" id="validationDefault04" placeholder="Custo do produto" required name="prd_custo" value="<?php $produtoBean->getPrd_custo() ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault05">Valor de Comercialização </label>
                        <input type="text" class="form-control" id="validationDefault05" placeholder="Preço de venda" required name="prd_preco" value="<?php $produtoBean->getPrd_preco() ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault05"> Quantidade </label>
                        <input type="text" class="form-control" id="validationDefault05" placeholder="Preço de venda" required name="prd_quantidade" value="<?php $produtoBean->getPrd_preco() ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="control-label" for="inputSucess1"> Status do produto</label>
                        <select class="form-control input-sm" name="prd_ativo">
                            <option <?php echo ("" == "S") ? "selected" : "" ?> value="S">Ativo</option>
                            <option <?php echo ("" == "N") ? "selected" : "" ?> value="N">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="control-label" for="inputSucess1"> Fornecedor </label>
                        <select class="form-control" name="for_codigo">
                            <option value="1"> Fornecedor Padrão</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> <i class="<?php echo ($codigo > 0) ? "fas fa-user-edit" : "fa fa-save" ?>"></i> <?php echo ($codigo > 0) ? "Alterar" : "Gravar" ?> </button>
                </div>
            </form>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS-->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>

