<?php
include_once('../Classes/Sequencia.class.php');
$usuario = new Sequencia();
 $usuario->IniciaSequencia('atcg','teste',1);
 echo $usuario->MostraObj();
//funcionou


?>