<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas sequências</title>
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Importação de css personalizado-->
    <link rel="stylesheet" href="./css/estilo.css">
    <!--Importação bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

<?php
    //verificando se usuário está logado

session_start();
    
if($_SESSION['status'] === 'logado'){
  include_once('../Classes/Sequencia.class.php');
  include_once('../Classes/Usuario.class.php');

  try{
  $codigo = filter_input(INPUT_GET,'codigo',FILTER_SANITIZE_SPECIAL_CHARS); //o código está recebendo o ID do usuário da URL do site
  
  //é necessário buscar novamente o ID aqui para comparar o ID do usuário da URL com o que realmente está logado
  $usuario = new Usuario();
  $loginuser = $_SESSION['loginuser']; //puxa o loginuser que está logado
  $id = $usuario->consultaId($loginuser); //busca o id do usuário que está logado

  //tratamento caso $id for vazio
  if(empty($id)){
    throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

}else{ //executa normalmente
  foreach($id as $confirma){
    $confirma[0]; //trás o valor do id do usuário que está logado
  }
}

  //verifica se o $codigo (id do usuário) é o mesmo da URL para evitar possíveis alterações
  if($codigo != $confirma[0]){
    throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

  }else{//executa normalmente

  //tratamento caso $codigo == null
  if(empty($codigo)){
    throw new Exception("Ocorreu um erro inesperado.");

  }else{//executa o programa normalmente

  $sequencia = new Sequencia();
  $retorno = $sequencia->exibeSequencia($codigo); //o exibeSequencia é chamado com base no ID do usuário que está logado

  }
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

    <form form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"> <!-- forms -->

    <header id="cabecalho">
        <a class="menuicon botao-menu" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <img class="imgmenu" src="./assets/menu.png" alt="">
        </a><!--Icone menu-->
        <div class="divtitulo">
            <h1 id="titulo" class="principal">
                   Sequências salvas
            </h1>
        </div><!--Div titulo-->
    </header><!--cabecalho-->
      <!--Offcanva-->
      <div class="offcanvas offcanvas-start" style="background-color: #262626; width: 175px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">  
        <div class="offcanvas-header">
              <button type="button" class="offcanvasclose" data-bs-dismiss="offcanvas" aria-label="Close"><img src="./assets/close.png" alt=""></button>
            </div><!--OFFCANVAS HEADER-->
            <div class="offcanvas-body" style="color: white;">
            <div id="lista-menu">
                <div class="menu-btn"><a class="menu-buttons" href="calculadora.php">Home</a></div>
              
                <div class="menu-btn border-top "><a class="menu-buttons" href="./logout.php">Sair</a></div>
            </div><!--LISTA MENU-->
        </div><!--OFFCANVAS BODY-->
        </div><!--Offcanva-->

        
<!-- bloco lista ------------------------------------------------------------->
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
          
         echo "<div class='align-middle mt-5'>";
         echo "<div class='sequencias container'>";
         echo "<div class='row pt-3 container'>";
         echo "<div class='pgmenu col-6 ps-5 pb-2'>";
         echo "";
         echo "</div>"; //parte do menu
         echo "<div class='pgmenu col-6 text-end pe-5 pb-2 '>";
         echo "<b>$exibe[2]</b>"; //aqui exibe o tipo genético
         echo "</div>"; //Parte do menu
         echo "</div>";
         echo "<div class='hr2'></div>";
         echo "<div class='row pt-3 pb-3  container'>";
         echo "<div class='col-8  py-3'>";
         echo "<textarea class='w-100 delimitar'  cols='10' rows='10' disabled>$exibe[1]</textarea>"; //aqui exibe a sequencia
         echo "</div>"; //Parte do menu-->
         echo "<div class='col-4  h-100 mt-3'>";
         echo "<a href='edita.php?codigosequencia=$exibe[0]' class='btn btn-warning align-middle h-100 col-12 m-1'>Editar</a>"; //botao de salvar
         echo "<a href='excluir.php?codigosequencia=$exibe[0]' class='btn btn-danger align-middle h-100 col-12 m-1'>Excluir</a>"; //botao de excluir ao acionar ele joga o ID da sequencia na URL
         echo "</div>"; //<!--Parte do menu-->
         echo   "</div>";
         echo   "</div>";
        echo "</div>";
        }
      }
    }
  }catch(Exception $e){
    echo $msg = $e->getMessage();
  }//end try catch
?>
<!--BLOCO LISTA------------------------------------------------------------------>
        
    </form><!-- end form -->

</body>
</html>