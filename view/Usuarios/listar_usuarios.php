<?php
session_start();
include_once '../session.php';
inicializa_sessao('300', 2);
error_reporting(E_ALL ^ E_NOTICE);
?>
<!doctype html>
<html lang="ptBr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <?php
        include_once '../config.php';
        include_once '../obter_css.php';
        ?>

        <title>Lista usuários</title>
    </head>
    <body>
        <h1> Lista de Usuários </h1>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Codigo Celular</th>
                        <th scope="col">Status</th>
                        <th scope="col">Desconto</th>
                        <th scope="col">Comição</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require_once '../../include/auto_load_path_2.php';

                    $usuario = new UsuarioInstance();
                    $usuarioBean = new UsuarioBean();
                    $usuarioBean = $usuario->c_buscar_todos_os_usuarios();
                    $count = count($usuarioBean);
       

                    foreach ($usuarioBean as $user) {
                        ?>

                        <tr>
                            <td><?php echo $user->getUsu_codigo() ?></td>
                            <td><?php echo $user->getUsu_nome() ?></td>
                            <td><?php echo $user->getUsu_email() ?></td>
                            <td><?php echo $user->getUsu_numerocel() ?></td>                               
                            <td><?php echo $user->getUsu_liberado() ?></td>
                            <td><?php echo $user->getUsu_desconto() ?></td>                              
                            <td><?php echo $user->getUsu_comissao() ?></td>
                            <td><?php echo $user->getUsu_usuario() ?></td>
                            <td><a href="CadastroUsuarios.php?usu_codigo=<?php echo $user->getUsu_codigo()?>"><i class="fas fa-user-edit"></i> </a></td>
                            <td><a href="javascript: if(confirm('Deseja Excluir o usuário <?php echo $user->getUsu_nome()?>')){location='CadastroUsuarios.php?acao=excluir&usu_codigo=<?php echo $user->getUsu_codigo()?>';}"><i class="fas fa-trash-alt"></i> </a></td>
                        </tr>


                    <?php } ?>
                </tbody>
            </table>
            <div class="alert alert-success" role="alert">
                <?php echo'Foram encontrados ' . $count . ' Registros.' ?>
            </div>
        </div>
    </body>
</html>
