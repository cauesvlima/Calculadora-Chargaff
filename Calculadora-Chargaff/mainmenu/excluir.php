<?php

session_start();

if($_SESSION['status'] === 'logado'){

  try{
  $codigosequencia = filter_input(INPUT_GET,'codigosequencia',FILTER_SANITIZE_SPECIAL_CHARS); //pegando o ID da sequencia na url quando o botao de excluir é acionado
  
  //tratameto de erro caso $codigosequencia for vazio
  if(empty($codigosequencia)){
    throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

  }else{ //executa o programa normalmente

  include_once('../Classes/Sequencia.class.php');
  include_once('../Classes/Usuario.class.php');
  $usuario = new Usuario();
  $sequencia = new Sequencia();

  $loginuser = $_SESSION['loginuser']; //pega o loginuser para consulta de ID
  $id = $usuario->consultaId($loginuser); //consulta o iduser novamente para quando o refresh ocorrer, a lista não da erro
  
  //tratamento caso $id for vazio
  if(empty($id)){
    throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

  }else{ //executa o programa normalmente
  
  foreach($id as $iduser){
    $iduser[0]; //retorna o id para quando o excluir voltar na lista nao dar erro
  }
  
  $sequencia->deletaSequencia($codigosequencia); //aqui está excluindo
  echo "<meta HTTP-EQUIV='refresh'CONTENT='0;URL=listasequencia.php?codigo=$iduser[0]'>"; //redireciona para o menu principal
}
}
}catch(Exception $e){
  echo $msg = $e->getMessage();
}
    
}else{
    header('Location: ../redireciona/redireciona.php');
}

//no  lista sequencia ele já está tratando o erro para caso o id do usuário da url for alterado
?>
