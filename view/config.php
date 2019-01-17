<?php

$path = $_SERVER['SERVER_NAME'];

if($path == "localhost"){
    $caminho = "http://". $path .'/Sistemacomercialweb/';
}else{
    $caminho = "http://".$path.'/';
}
define('HOST_PATH_NAME',$caminho);

?>
