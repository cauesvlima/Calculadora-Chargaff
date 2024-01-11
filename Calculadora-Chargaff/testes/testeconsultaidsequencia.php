<?php
include_once('../Classes/Sequencia.class.php');

$consulta = new Sequencia();
$id = 32;
$retorno = $consulta->consultaSequenciaId($id);

//var_dump($consulta);

foreach($retorno as $exibe){
    echo $exibe[0];
    echo $exibe[1]; 
}



?>