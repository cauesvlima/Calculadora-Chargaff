<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas sequências</title>

<?php

session_start();
//include_once('header.php');
if($_SESSION['status'] === 'logado'){
  include_once('../Classes/Sequencia.class.php');

  try{
  $codigo = filter_input(INPUT_GET,'codigo',FILTER_SANITIZE_SPECIAL_CHARS); //o código está recebendo o ID do usuário da URL do site
  
  //tratamento caso $codigo == null
  if(empty($codigo)){
    throw new Exception("Ocorreu um erro inesperado.");

  }else{//executa o programa normalmente
  $sequencia = new Sequencia();
  
  $retorno = $sequencia->exibeSequencia($codigo); //o exibeSequencia é chamado com base no ID do usuário que está logado

  }
}catch(Exception $e){
    echo $msg = $e->getMessage();
  }
    
}else{
    header('Location: ../redireciona/redireciona.php');
}


?>
</head>
<body>

<form form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
<table>
  <thead>
    <tr>
      <th colspan="">Sequência</th>
      <th>Tipo</th>
    </tr>

  </thead>

  <!-- tabela retornando as sequencias e os tipos das sequencias do usuário logado -->
  <tbody>
    <tr>
      <td>
        <?php 

        try{
        //retornando a sequência

        //tratamento caso $retorno == null || string
        if(empty($retorno) || is_string($retorno)){
          throw new Exception("Não há sequencias para serem exibidas.");

        }else{ //executa normalmente

        foreach($retorno as $exibe){

        //tratamento caso $exibe == null
        if(empty($exibe)){
          throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

        }else{//executa normalmente
          $exibe[0]; //id da sequencia
          echo $exibe[1].'<br/>'; //sequencia
        }
      }
    }
  }catch(Exception $e){
    echo $msg = $e->getMessage();
  }//end try catch
?>
</td>

<td>
    <?php
    //retornando o tipo = DNA, RNA m ou RNA t

    try{

      //tratamento caso $retorno == null || string
      if(empty($retorno) || is_string($retorno)){
       throw new Exception("Não há sequencias para serem exibidas.");

    }else{//executa normalmente
    
      foreach($retorno as $exibe){
        
        //tratamento caso $exibe == null
        if(empty($exibe)){
          throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

        }else{//executa normalmente
          echo htmlspecialchars($exibe[2]).' '."<button name='editar'><a href='edita.php?sequencia=$exibe[0]'>EDITAR</a></button>".'<br/>';
        }
    }
    }  
  }catch(Exception $e){
    echo $msg = $e->getMessage();
  }  //end trycatch
?>
</td>

    </tr>
  </tbody>
  <!-- nessa pagina é necessário somente fazer a tabela e jogar o código php dentro -->
</table>
</form>
</body>
</html>