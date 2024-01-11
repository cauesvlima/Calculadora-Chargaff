<?php
include_once('../Classes/Usuario.class.php');
$user = new Usuario ();
$user->IniciaObj('Miguel brabor','cuzin');
var_dump($user->consultaLogaUsuario()) ;

//funcionou
?>