<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>

    <?php

session_start();
//include_once('header.php');
if($_SESSION['status'] === 'logado'){
 
    try{
        
    $idsequencia = filter_input(INPUT_GET,'sequencia',FILTER_SANITIZE_SPECIAL_CHARS);//pega o id da sequencia da url para jogar na função
    $loginuser = $_SESSION['loginuser']; //o loginuser esta sendo armazenado na variavel para posteriormente ser utilizado para a consulta de ID
    
    //tratamento de excessão = idsequencia ou loginuser vazio
    if(empty($idsequencia) || empty($loginuser)){
        throw new Exception("Ocorreu um erro inesperado! Contate o ADM!"); //gera uma exceção
        
    }else{ //caso contrário executa o programa normalmente

        include_once('../Classes/Usuario.class.php');
        include_once('../Classes/Sequencia.class.php');

        $usuario = new Usuario(); 
        $consulta = new Sequencia();
        $retorno = $consulta->consultaSequenciaId($idsequencia); //traz a sequencia com base no ID
      
        //tratamento de excessão: $retorno falso
        if(empty($retorno) || is_string($retorno)){
            throw new Exception("Ocorreu um erro inesperado! Contate o ADM!"); //gera a exceção caso $retorno == false
    }else{
        foreach($retorno as $exibe){ //retorna a sequencia para o usuário alterar

            //tratamento caso $exibe == null
            if(empty($exibe)){
                throw new Exception("Ocorreu um erro inesperado! Contate o ADM!"); //gera a exceção caso $retorno == false
            }else{
                $exibe[1]; //tipo da sequencia
            }
       }
    }//end if 
}//end if 

    }catch(Exception $e){
       echo $msg = $e->getMessage(); //exibe uma mensagem de erro caso $retorno == false
    }

}else{
    header('Location: ../redireciona/redireciona.php');
}

?>
</head>
<body>
    
<form action="edita2.php" method="post" enctype="multipart/form-data">
<!--<h3><label for="idsequencia">EDITE A SEQUENCIA</label><input type="text" name="editasequencia" id="idsequenica" value="// echo isset($exibe[0]) ? htmlspecialchars($exibe[0]) : 'Ocorreu um erro.' ?>"></h3>-->


<?php
// Verifique se $exibe[1] contém dados

try{
    //tratamento
if (empty($exibe[1])) { //caso o exibe nao retorne o tipo da sequencia, ele gerará um erro
    throw new Exception("Ocorreu um erro insperado. Contate o ADM!");
} else {
   if($exibe[1] == 'DNA'){ //caso a sequencia for DNA, ela vai jogar no edita o valor no campo DNA e deixar o RNA vazio
    echo "<h3><label for='idsequencia'>DIGITE o DNA</label><input type='text' name='dna' id='idsequenica' value='$exibe[0]'></h3>";
    echo "<h3><label for='idsequencia'>DIGITE o RNA</label><input type='text' name='rna' id='idsequenica'></h3>";

   }else if($exibe[1] == 'RNA'){ //caso a sequencia for RNA, ela vai jogar o valor no edita o valor do campo RNA e deixar o DNA vazio
    echo "<h3><label for='idsequencia'>DIGITE o DNA</label><input type='text' name='dna' id='idsequenica' value=''></h3>";
    echo "<h3><label for='idsequencia'>DIGITE o RNA</label><input type='text' name='rna' id='idsequenica' value='$exibe[0]'></h3>";
   }
    
    //a logica é a mesma para outros tipos de botao
}
}catch(Exception $e){
    echo $msg = $e->getMessage();
}//end trycatch
?>
<input type="submit" name="enviar">
<input type="hidden" name="editaidsequencia" value="<?php echo htmlspecialchars($idsequencia) ?>">

</form>
</body>
</html>