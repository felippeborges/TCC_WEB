<?php
include_once '../session.php';
inicializa_sessao('300', 2);
error_reporting(E_ALL ^ E_NOTICE);

require_once '../../include/auto_load_path_2.php';

$cliente = new ClienteInstance();
$clienteBean = new ClienteBean();
$usuario = new UsuarioInstance();
$usuarioBean = new UsuarioBean();

$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
$codigo = (isset($_POST["cli_codigo"])) ? $_POST["cli_codigo"] : ((isset($_GET["cli_codigo"])) ? $_GET["cli_codigo"] : 0 );

if ($codigo > 0) {
    // buscar o cliente com o codigo do cliente;
    $clienteBean = $cliente->c_buscar_cliente_por_codigo($codigo);
}

if ($acao != "") {
    if ($acao == "incluir") {
        //ação para cadastrar o usuário;
        $cliente->c_gravar_cliente();
        header("Location:listar_clientes.php");
    }
    if ($acao == "editar") {
        //ação para alterar o usuário;
        $cliente->c_alterar_cliente_WEB();
        header("Location:listar_clientes.php");
    }
    if ($acao == "excluir") {
        //ação para excluir o usuário
        $cliente->c_excluir_cliente($codigo);
        header("Location:listar_clientes.php");
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
        <script src="ajax_buscar_cidades.js"></script>
    </head>
    <body>
        <form action="CadastroClientes.php" method="post">

            <input type="hidden" name="acao" value="<?php echo ($codigo > 0) ? "editar" : "incluir" ?>"  />

            <input hidden="" name="cli_codigo" value="<?php echo $clienteBean->getCli_codigo() ?>"  />

            <input hidden="" name="cli_chave" value="<?php echo $clienteBean->getCli_chave() ?>"  />

            <div class="form-row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" >Código do Usuário</label>
                    <input disabled type="text" name="cli_codigo" value="<?php echo $clienteBean->getCli_codigo() ?>"  class="form-control" >
                </div>

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" >Identificador do Cliente</label>
                    <input disabled type="text" name="cli_chave" value="<?php echo $clienteBean->getCli_chave() ?>"  class="form-control" >
                </div>  

                <div class=" col-md-12 col-sm-12">
                    <label class="control-label" for="inputWarning1">Nome do Cliente</label>
                    <input required type="text" name="cli_nome" class="form-control" value="<?php echo $clienteBean->getCli_nome() ?>" id="inputWarning1">
                </div>

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Nome Fantasia</label>
                    <input required type="text" name="cli_fantasia" class="form-control" value="<?php echo $clienteBean->getCli_fantasia() ?>" id="inputError1">
                </div>
                <div class="col-xs-12 col-md-6 col-sm-12">
                    <label class="control-label" for="inputSuccess1">Estado</label>
                    <select  data-toggle="tooltip" data-placement="bottom" title="selecione um estado para a cidade" class="form-control input-sm"   id="cid_uf"   name="cid_uf" >                       
                        <option value="TT">[ --Selecione o estado-- ]</option>
                        <option <?php echo ("" == "SP") ? "selected" : ""; ?> value="SP">Sao Paulo</option>
                        <option <?php echo ("" == "RJ") ? "selected" : ""; ?> value="RJ">Rio de Janeiro</option>
                        <option <?php echo ("" == "AC") ? "selected" : ""; ?> value="AC">Acre</option>
                        <option <?php echo ("" == "AL") ? "selected" : ""; ?> value="AL">Alagoas</option>
                        <option <?php echo ("" == "AP") ? "selected" : ""; ?> value="AP">Amapa</option>
                        <option <?php echo ("" == "AM") ? "selected" : ""; ?> value="AM">Amazonas</option>
                        <option <?php echo ("" == "BA") ? "selected" : ""; ?> value="BA">Bahia</option>
                        <option <?php echo ("" == "CE") ? "selected" : ""; ?> value="CE">Ceara</option>
                        <option <?php echo ("" == "DF") ? "selected" : ""; ?> value="DF">Distrito Federal</option>
                        <option <?php echo ("" == "GO") ? "selected" : ""; ?> value="GO">Goias</option>
                        <option <?php echo ("" == "ES") ? "selected" : ""; ?> value="ES">Espirito Santo</option>
                        <option <?php echo ("" == "MA") ? "selected" : ""; ?> value="MA">Maranhao</option>
                        <option <?php echo ("" == "MT") ? "selected" : ""; ?> value="MT">Mato Grosso</option>
                        <option <?php echo ("" == "MS") ? "selected" : ""; ?> value="MS">Mato Grosso do Sul</option>
                        <option <?php echo ("" == "MG") ? "selected" : ""; ?> value="MG">Minas Gerais</option>
                        <option <?php echo ("" == "PA") ? "selected" : ""; ?> value="PA">Para</option>
                        <option <?php echo ("" == "PB") ? "selected" : ""; ?> value="PB">Paraiba</option>
                        <option <?php echo ("" == "PR") ? "selected" : ""; ?> value="PR">Paraná</option>
                        <option <?php echo ("" == "PE") ? "selected" : ""; ?> value="PE">Pernambuco</option>
                        <option <?php echo ("" == "PI") ? "selected" : ""; ?> value="PI">Piaui­</option>
                        <option <?php echo ("" == "RN") ? "selected" : ""; ?> value="RN">Rio Grande do Norte</option>
                        <option <?php echo ("" == "RS") ? "selected" : ""; ?> value="RS">Rio Grande do Sul</option>
                        <option <?php echo ("" == "RO") ? "selected" : ""; ?> value="RO">Rondonia</option>
                        <option <?php echo ("" == "RR") ? "selected" : ""; ?> value="RR">Roraima</option>
                        <option <?php echo ("" == "SC") ? "selected" : ""; ?> value="SC">Santa Catarina</option>
                        <option <?php echo ("" == "SE") ? "selected" : ""; ?> value="SE">Sergipe</option>
                        <option <?php echo ("" == "TO") ? "selected" : ""; ?> value="TO">Tocantins</option>
                    </select>
                </div>


                <div class="col-xs-12 col-md-6 col-sm-12">
                    <label class="control-label" for="inputError1">Cidade  <?php echo $clienteBean->getCid_nome() ?>  </label>
                    <select class="form-control" name="cid_codigo" id="cid_codigo" >
                        <option value="<?php echo $clienteBean->getCid_codigo() ?>" > <?php echo $clienteBean->getCid_nome() ?>  </option>
                    </select>
                </div>


                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Endereço</label>
                    <input required type="text" name="cli_endereco" class="form-control" value="<?php echo $clienteBean->getCli_endereco() ?>" id="inputError1">
                </div>

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Contato</label>
                    <input required type="text" name="cli_contato" class="form-control" value="<?php echo $clienteBean->getCli_contato() ?>" id="inputError1">
                </div>


                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Data Nasc.</label>
                    <input required type="text" name="cli_nascimento" class="form-control" value="<?php echo $clienteBean->getCli_nascimento() ?>" id="inputError1">
                </div>


                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">CPF / CNPJ</label>
                    <input required type="text" name="cli_cpfcnpj" class="form-control" value="<?php echo $clienteBean->getCli_cpfcnpj() ?>" id="inputError1">
                </div>



                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Rg/Insc.Est</label>
                    <input required type="text" name="cli_rginscricaoest" class="form-control" value="<?php echo $clienteBean->getCli_rginscricaoest() ?>" id="inputError1">
                </div>


                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">E-mail</label>
                    <input required type="email" name="cli_email" class="form-control" value="<?php echo $clienteBean->getCli_email() ?>" id="inputError1">
                </div>


                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Bairro</label>
                    <input required type="text" name="cli_bairro" class="form-control" value="<?php echo $clienteBean->getCli_bairro() ?>" id="inputError1">
                </div>



                <div class="col-xs-12 col-md-12 col-sm-6">
                    <label class="control-label" for="inputError1">Cep</label>
                    <input required type="text" name="cli_cep" class="form-control" value="<?php echo $clienteBean->getCli_cep() ?>" id="inputError1">
                </div>

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <label class="control-label" for="inputError1">Vendedor</label>
                    <select class="form-control" name="usu_codigo" >                 

                        <?php
                        $usuarioBean = $usuario->c_buscar_todos_os_usuarios();
                        foreach ($usuarioBean as $user) {
                            ?>
                            <option    <?php echo ($clienteBean->getUsu_codigo() == $user->getUsu_codigo()) ? "selected" : "" ?>    value="<?php echo $user->getUsu_codigo() ?>" >  <?php echo $user->getUsu_nome() ?>  </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"> <i class="<?php echo ($codigo > 0) ? "fas fa-user-edit" : "fa fa-floppy-o" ?>"></i> <?php echo ($codigo > 0) ? "Alterar" : "Gravar" ?> </button>
            </div>


        </form>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>


