<?php

header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL ^ E_NOTICE);
session_start();

function inicializa_sessao($tempo_logado, $erro = null) {

    if (!$_SESSION["usu_usuario"]) {//caso o usuario erre, ira retornar ele para tela de Login com o erro
        header("Location:../index.php?erro=" . $erro);
    } else {//Configura um tempo para que o usuario fique logado no sistema(tempo de inatificade)
        if (isset($_SESSION["ultimoclick"])and ! empty($_SESSION["ultimoclick"])) {

            $tempoAtual = time();

            if (($tempoAtual - $_SESSION["ultimoclick"]) > $tempo_logado) {

                unset($_SESSION["ultimoclick"]);
                $_SESSION = array();
                session_destroy();
                header("Location:../index.php");
                exit();
            } else {

                $_SESSION["ultimoclick"] = time();
            }
        } else {

            $_SESSION["ultimoclick"] = time();
        }
    }
}
?>

