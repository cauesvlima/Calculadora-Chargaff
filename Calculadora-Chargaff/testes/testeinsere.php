<?php

include_once("../Classes/Usuario.class.php");
$usuario3 = new Usuario();
$usuario3->IniciaObj('Paula dos santos','senha');
echo $usuario3->insereUser();
//funcionou
?>