<?php
include_once('../Classes/Usuario.class.php');
$usuario = new Usuario();
 $usuario->IniciaObj('miguel','1234');
 echo $usuario->MostraObj();
//funcionou


?>