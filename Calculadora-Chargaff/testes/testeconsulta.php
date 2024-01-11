<?php
include_once('../Classes/Sequencia.class.php');

$sequencia = new Sequencia();

$retorno = $sequencia->exibeSequencia(29);
if($retorno){
    foreach($retorno as $exibe){
        echo $exibe[0].' | '.$exibe[1].'<br/>';
    }
}




?>