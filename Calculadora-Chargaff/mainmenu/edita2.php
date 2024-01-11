<?php

if(isset($_POST['enviar'])){
    if(isset($_COOKIE['idusuario'])){ //verifica a criação do cookie para enviar o ID do usuário ao retornar pra lista
        $id = filter_input(INPUT_COOKIE, 'idusuario', FILTER_SANITIZE_NUMBER_INT); //sanitizando cookie idusuario
    }else{
        throw new Exception("Ocorreu um erro inesperado! Contate o ADM!");
    }
    try{
    include_once('../Classes/Sequencia.class.php');

    $idsequencia = filter_input(INPUT_POST,'editaidsequencia',FILTER_SANITIZE_SPECIAL_CHARS); //recebe o id da sequencia para editá-la com o input hidden
    $dna = strtoupper(filter_input(INPUT_POST,'input-dna',FILTER_SANITIZE_SPECIAL_CHARS)); //recebe o dna do input DNA
    $rna = strtoupper(filter_input(INPUT_POST,'input-rna',FILTER_SANITIZE_SPECIAL_CHARS)); //recebe o rna do input RNA

        //tratamento de exceção cas $idsequencia forem vazios
    if(empty($idsequencia)){
        throw new Exception("Ocorreu um erro inesperado! Contate o ADM!"); //gera uma mensagem de erro(3)

    }else{ //caso $idsequencia obtiver sucesso, ele executará o programa normalmente

        //tratamento caso o usuário não digite em nenhum campo
        if($dna == null && $rna == null){
            echo "Insira o valor em um único campo desejado.";
            echo "<meta HTTP-EQUIV='refresh'CONTENT='3;URL=edita.php?codigosequencia=$idsequencia'>";

        }else{ //caso haja valor em algum dos campos o código será executado

    if($dna == null){ //se o campo DNA for vazio, o programa entende que o usuário desejará salvar o RNA
        $edita = new Sequencia();
        $edita->editaSequencia($idsequencia,$rna,'RNA'); //chama a função colocando o tipo no RNA
        echo "<meta HTTP-EQUIV='refresh'CONTENT='0;URL=listasequencia.php?codigo=$id'>"; //redireciona para o menu principal

    }else if($rna == null){ //se o campo RNA for vazio, o programa entende que o usuário desejará salvar o DNA
        $edita = new Sequencia();
        $edita->editaSequencia($idsequencia,$dna,'DNA');//chama a função colocando o tipo no DNA
        echo "<meta HTTP-EQUIV='refresh'CONTENT='0;URL=listasequencia.php?codigo=$id'>"; //redireciona para o menu principal
    }
    else{ 
        echo 'Digite apenas no campo que você deseja salvar.'; //caso o usuário digite nos dois campos

   echo "<meta HTTP-EQUIV='refresh'CONTENT='3;URL=edita.php?codigosequencia=$idsequencia'>"; 
   //retorna para a página de edição jogando o id da sequencia na url novamente

    }//end if (3)
}
    }
    }catch(Exception $e){
        echo $msg = $e->getMessage(); //exibe a mensagem de erro
        echo "<meta HTTP-EQUIV='refresh'CONTENT='3;URL=calculadora.php'>"; //direciona o usuario para o menu
    }
}

?>