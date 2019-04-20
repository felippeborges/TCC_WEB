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
                        <th scope="col">Nome Fantasia</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require_once '../../include/auto_load_path_2.php';

                    $cliente = new ClienteInstance();
                    $clienteBean = new ClienteBean();
                    $clienteBean = $cliente->c_buscar_todos_os_cliente();
                    $count = count($clienteBean);                   
       

                    foreach ($clienteBean as $client) {
                        ?>

                        <tr>
                            <td><?php echo $client->getCli_codigo() ?></td>
                            <td><?php echo $client->getCli_nome() ?></td>
                            <td><?php echo $client->getCli_fantasia() ?></td>
                            <td><?php echo $client->getCli_email() ?></td>                               
                            <td><?php echo $client->getCli_contato() ?></td>
                            <td><?php echo $client->getUsu_nome() ?></td>                              
                            <td><?php echo $client->getCid_nome() ?></td>
                           
                            <td><a href="CadastroClientes.php?cli_codigo=<?php echo $client->getCli_codigo()?>"><i class="fas fa-user-edit"></i> </a></td>
                            <td><a href="javascript: if(confirm('Deseja Excluir o cliente <?php echo $client->getCli_nome()?>')){location='CadastroClientes.php?acao=excluir&cli_codigo=<?php echo $client->getCli_codigo()?>';}"><i class="fas fa-trash-alt"></i> </a></td>
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
