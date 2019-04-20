<?php
include_once '../session.php';
inicializa_sessao('300', 2);
error_reporting(E_ALL ^ E_NOTICE);


require_once '../../include/auto_load_path_2.php';



$fornecedor = new FornecedoresInstance();
$fornBean = new FornecedoresBean();



$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");
$codigo = (isset($_POST["for_codigo"])) ? $_POST["for_codigo"] : ((isset($_GET["for_codigo"])) ? $_GET["for_codigo"] : 0);


if ($codigo > 0) {
    $fornBean = $fornecedor->c_BuscarFornecedorPorCodigo();
}

if ($acao != "") {

    if ($acao == "incluir") {
        $fornecedor->c_gravarFornecedores();
        header("Location:listar_fornecedores.php");
    }

    if ($acao == "alterar") {
        $fornecedor->c_editarFornecedores();
        header("Location:listar_fornecedores.php");
    }

    if ($acao == "excluir") {
        $fornecedor->c_excluirFornecedor();
        header("Location:listar_fornecedores.php");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <?php
        include_once '../obter_css.php';
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="ajax_buscar_cidades.js"></script>
    </head>
    <body>


        <form class="form-group" name="frm_fornecedor" id="frm_fornecedor" method="post" action="CadastroFornecedores.php">

            <input type="hidden" name="acao" value="<?php echo ($codigo > 0) ? "alterar" : "incluir" ?>" />
            <input type="hidden" name="for_codigo" value="<?php echo $fornBean->getFor_codigo() ?>" />
            <input type="hidden" name="cid_codigo" value="<?php echo $fornBean->getCid_codigo() ?>"  />
            <br/>

            <div class="col-xs-12 col-md-12 col-sm-12">
                <label class="control-label" for="inputSuccess1">Estado</label>
                <select  data-toggle="tooltip"  class="form-control input-sm"   id="cid_uf"   name="cid_uf" >                       
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


            <div class="col-xs-12 col-md-12 col-sm-12">
                <label class="control-label" for="inputSuccess1">Cidade</label>  

                <select   class="form-control input-sm" required  id="cid_codigo"    name="cid_codigo"  >
                    <option value="<?php echo $fornBean->getCid_codigo() ?>" > <?php echo $fornBean->getCid_nome() ?>  </option>
                </select>


            </div>


            <div class="col-xs-12 col-md-12 col-sm-12">
                <label   class="control-label" for="inputSuccess1" >Razão social:</label>
                <input class="form-control input-sm"  type="text"   required   placeholder="razão social" name="for_razaosocial"  value="<?php echo $fornBean->getFor_razaosocial() ?>" />
            </div>


            <div class="col-xs-12 col-md-12 col-sm-12">
                <label   class="control-label" for="inputSuccess1" >Nome Fantasia:</label>
                <input class="form-control input-sm"  type="text"      required   placeholder="fantasia" name="for_fantasia"  value="<?php echo $fornBean->getFor_fantasia() ?>" />
            </div>


            <div class="col-xs-12 col-md-12 col-sm-12">
                <label   class="control-label" for="inputSuccess1" >CPF/CNPJ:</label>
                <input class="form-control input-sm"  type="text"     required   placeholder="CNPJ" name="for_cnpjcpf"  value="<?php echo $fornBean->getFor_cnpjcpf() ?>" />
            </div>



            <div class="col-xs-12 col-md-12 col-sm-12">
                <label class="control-label" for="inputSuccess1">E-mail</label>  
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input class="form-control input-sm"  type="text"     placeholder="Email" name="for_email"  value="<?php echo $fornBean->getFor_email() ?>" />
                </div>
            </div>

            <div class="col-xs-12 col-md-12 col-sm-12">
                <label   class="control-label" for="inputSuccess1" >Endereço:</label>
                <input class="form-control input-sm"  type="text"    required   placeholder="endereço" name="for_endereco"  value="<?php echo $fornBean->getFor_endereco() ?>" />
            </div>


            <div class="col-xs-12 col-md-12 col-sm-12">
                <label   class="control-label" for="inputSuccess1" >Bairro:</label>
                <input class="form-control input-sm"  type="text"    required   placeholder="bairro" name="for_bairro"  value="<?php echo $fornBean->getFor_bairro() ?>" />
            </div>


            <div class="col-xs-12 col-md-12 col-sm-12">
                <label   class="control-label" for="inputSuccess1" >Cep:</label>
                <input class="form-control input-sm"  type="text"    required   placeholder="CEP" name="for_cep"  value="<?php echo $fornBean->getFor_cep() ?>" />
            </div>


            <div class="col-xs-12 col-md-12 col-sm-12">
                <label   class="control-label" for="inputSuccess1" >Contato 1 (telefone fixo):</label>
                <input class="form-control input-sm"  type="text"    required  placeholder="telefone fixo Ex:(16)3816-1955" id="for_contato1" name="for_contato1" value="<?php echo $fornBean->getFor_contato1() ?>" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> <i class="<?php echo ($codigo > 0) ? "fas fa-user-edit" : "fa fa-save" ?>"></i> <?php echo ($codigo > 0) ? "Alterar" : "Gravar" ?> </button>
            </div>
        </form>                
        </div>
        <script src="../js/google.apis.js"></script>
        <script src="../js/bootstrap.min.js"></script>


    </body>           

</html>
