<?php
session_start();
include '../session.php';
inicializa_sessao("3000", 2);
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title></title>
        <?php
        include_once '../obter_css.php';
        include_once '../config.php';
        ?>


    </head>

    <body>
        <br/>
        <div class="container-fluid">          
            <h1>Lista de Fornecedores</h1>
            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Razão-Social</th>
                        <th>Nome-Fantasia</th>   
                        <th>Cidade</th>   
                        <th>Contato</th>                              
                        <th>CPF/CNPJ</th>
                        <th>E-mail</th>
                        <th>Ação</th>
                    </tr>

                </thead> 

                <tbody>
                    <?php
                    require_once '../../include/auto_load_path_2.php';
                    
                    $fornecedor = new FornecedoresInstance();
                    $fornecedorBean = new FornecedoresBean();
                    $fornecedorBean = $fornecedor->C_buscaTodosFornecedores();
                    $count = count($fornecedorBean);
                    
                    foreach ($fornecedorBean as $p) {
                        ?>
                        <tr>

                            <td><?php echo $p->getFor_razaosocial() ?></td>
                            <td><?php echo $p->getFor_fantasia() ?></td>   
                            <td><?php echo $p->getCid_nome() ?></td>   
                            <td><?php echo $p->getFor_contato1() ?></td>
                            <td><?php echo $p->getFor_cnpjcpf() ?></td>
                            <td><?php echo $p->getFor_email() ?> </td>
                            <td><a href="CadastroFornecedores.php?for_codigo=<?php echo $p->getFor_codigo() ?>"><i class="fas fa-user-edit"></i></a></td>
                            <td><a href="javascript: if(confirm('Deseja Excluir o Fornecedor <?php echo $p->getFor_codigo() ?>')){location='CadastroFornecedores.php?acao=excluir&for_codigo=<?php echo $p->getFor_codigo() ?>';}"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>

            <div class="alert alert-success" role="alert">
                <?php echo 'foram encontrados ' . $count . ' fornecedor(es)' ?>
            </div> 
        </div>

</html>

