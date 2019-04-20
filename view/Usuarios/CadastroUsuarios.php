<?php
session_start();
include_once '../session.php';
inicializa_sessao('300', 2);
error_reporting(E_ALL ^ E_NOTICE);

require_once '../../include/auto_load_path_2.php';

$usuario = new UsuarioInstance();
$usuarioBean = new UsuarioBean();

$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : 0 );
$codigo = (isset($_POST["usu_codigo"])) ? $_POST["usu_codigo"] : ((isset($_GET["usu_codigo"])) ? $_GET["usu_codigo"] : 0 );

if ($codigo > 0) {
    // buscar o cliente com o codigo do cliente;
    $usuarioBean = $usuario->c_buscar_usuario_por_codigo($codigo);
}

if ($acao != "") {
    if ($acao == "incluir") {
        //ação para cadastrar o usuário;
        $usuario->c_gravar_usuario();
        header("Location:listar_usuarios.php");
    } 
    if ($acao == "editar") {
        //ação para alterar o usuário;
        $usuario->c_alterar_usuario();
        header("Location:listar_usuarios.php");
    }
    if ($acao == "excluir") {
        //ação para excluir o usuário
        $usuario->c_deleta_usuario();
        header("Location:listar_usuarios.php");
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
    </head>
    <body>
        
        <form action="CadastroUsuarios.php" method="post">

            <input type="hidden" name="acao" value="<?php echo ($codigo > 0) ?  "editar" : "incluir" ?>"  />

            <input hidden="" name="usu_codigo" value="<?php echo $usuarioBean->getUsu_codigo() ?>"  />


            <div class="row justify-content-between">
                <div class="form-group col-md-2">
                    <label class="control-label">Código do Usuário</label>
                    <input disabled type="text" class="form-control" name="usu_codigo" placeholder="Código" value="<?php echo $usuarioBean->getUsu_codigo() ?>">
                </div>
                <div class="form-group col-md-3 ">
                    <label >Status para o Usuário</label>
                    <select class="form-control" name="usu_nivel">
                        <option value="1"selected>Administrador</option>
                        <option value="2">Usuário</option>
                    </select>
                </div>
                <div class="form-group col-md-2 ">
                    <label >Status para o Usuário</label>
                    <select class="form-control" name="usu_liberado">
                        <option value="S"selected>Liberado</option>
                        <option value="N">Bloqueado</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label required for="inputEmail4">Nome Completo</label>
                    <input type="text" class="form-control"name="usu_nome" placeholder="Nome Completo" value="<?php echo $usuarioBean->getUsu_nome() ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" name="usu_email" placeholder="Email" value="<?php echo $usuarioBean->getUsu_email() ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Usuário</label>
                    <input required type="text" class="form-control" name="usu_usuario" placeholder="Usuário" value="<?php echo $usuarioBean->getUsu_usuario() ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Senha</label>
                    <input required type="password" class="form-control" name="usu_senha" placeholder="Senha" value="<?php echo $usuarioBean->getUsu_senha() ?>" >
                </div>

            </div>  
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCity">Desconto</label>
                    <input type="text" class="form-control" placeholder="Desconto" name="usu_desconto" value="<?php echo $usuarioBean->getUsu_desconto() ?>" >
                </div>

                <div class="form-group col-md-2">
                    <label for="inputZip">Comissao</label>
                    <input type="text" class="form-control" placeholder="Comissao" name="usu_comissao" value="<?php echo $usuarioBean->getUsu_comissao() ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Código do Celular</label>
                    <input disabled type="text" class="form-control" name="usu_celkey" placeholder="Código do Celular" value="<?php echo $usuarioBean->getUsu_celkey() ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label class="control-label">Número do celular</label>
                    <input required type="text" class="form-control" name="usu_numerocel" placeholder="Número do celular" value="<?php echo $usuarioBean->getUsu_numerocel() ?>" >
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"> <i class="<?php echo ($codigo > 0) ? "fas fa-user-edit" : "fa fa-floppy-o" ?>"></i> <?php echo ($codigo > 0) ? "Alterar" : "Gravar" ?> </button>
            </div>


        </form>
        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>

