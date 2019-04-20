<!doctype html>

<?php
header("Content-Type: text/html; charset=UTF-8");
error_reporting(E_ALL ^ E_NOTICE);


if ($_POST) {
    require_once './include/auto_load_path_1.php';
    
    $usuario = new UsuarioInstance();
    $usuarioBean = new UsuarioBean();
    $usuarioBean = $usuario->c_buscar_registro_por_usuario_senha();

    if (!is_null($usuarioBean->getUsu_usuario()) && !is_null($usuarioBean->getUsu_senha())) {

        session_start();
        $_SESSION["usu_codigo"] = $usuarioBean->getUsu_codigo();
        $_SESSION["usu_usuario"] = $usuarioBean->getUsu_usuario();
        $_SESSION["usu_email"] = $usuarioBean->getUsu_email();
        
        header("Location:view/admin.php");
    }else{
        header("Location:index.php?erro=1");
    }
}
?>

<html lang="pt_BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="Jekyll v3.8.5">
        <link rel="icon" href="#">
        <title>Sistema Representante Comercial </title>

        <!-- Bootstrap core CSS -->
        <?php
        include_once './view/config.php';
        include_once './view/obter_css.php';
        ?>
        <link rel="stylesheet" href="<?php echo  HOST_PATH_NAME;?>view/css/logincss.css" media="screen">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

    </head>
    <div class="container">
    <body class="text-center">
        <form class="form-signin" action="index.php" method="POST">
            <!--<img class="mb-4" src="" alt="" width="72" height="72">-->
            <h1 class="h3 mb-3 font-weight-normal">Acesso Restrito    </h1>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="text" name="usu_usuario" class="form-control" placeholder="Usuário " required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" name="usu_senha" class="form-control" placeholder="Password" required>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit"> Acessar </button>
            <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
        </form>
        <?php
        switch ($_GET["erro"]){
            case 1:
                echo '<a href="#" class="btn btn-default btn-block" value=""> Erro de Login </a>'; 
                break;
            case 2:
                echo '<a href="#" class="btn btn-default btn-block" value=""> Impossivel Acessar esse link sem efetuar o login no sistema </a>';
                break;
        }
        ?>
    </div><!--/container-->
    </body>
</html>

