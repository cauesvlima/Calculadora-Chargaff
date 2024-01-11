<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"  initial-scale="1.0">
    <meta name="author"
        content="Cauê Silveira Vaz de Lima, Miguel Sacardo Lalla Rosa, Brayan Júnior de Souza, Lorenna Nicole Alves Jacob, Ricardo Santanna Ferraço">
    <meta name="reply-to" content=" caue.lima9@etec.sp.gov.br">
    <meta name="description"
        content="Esse site realiza o processo de transcrição do material genético utilizando as regras estabelecidas pelo bioquímico Erwin Chargaff">
    <meta name="keywords"
        content="Dna, transcrição, Rna, Erwin Chargaff, material genético, bioquímica, genes, regra de Chargaff">
    <title>Calculadora de Chargaff</title>
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--Importação de css personalizado-->
    <link rel="stylesheet" href="./css/style.css">

    <!--Importação bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
        <style>

            .input-dna{
        
                text-transform: uppercase;
                resize: none;
        
            }
        
        </style>
</head>

<?php

session_start();
//include_once('header.php');
if($_SESSION['status'] === 'logado'){
 
    try{
        
    $idsequencia = filter_input(INPUT_GET,'codigosequencia',FILTER_SANITIZE_SPECIAL_CHARS);//pega o id da sequencia da url para jogar na função
    $loginuser = $_SESSION['loginuser']; //o loginuser esta sendo armazenado na variavel para posteriormente ser utilizado para a consulta de ID
    
    //tratamento de excessão = idsequencia ou loginuser vazio
    if(empty($idsequencia) || empty($loginuser)){
        throw new Exception("Ocorreu um erro inesperado! Contate o ADM!"); //gera uma exceção
        
    }else{ //caso contrário executa o programa normalmente

        include_once('../Classes/Usuario.class.php');
        include_once('../Classes/Sequencia.class.php');
        include_once('../Classes/Proteinas.class.php');

        $usuario = new Usuario(); 
        $consulta = new Sequencia();
        $buscaproteina = new Proteinas();
        $retorno = $consulta->consultaSequenciaId($idsequencia); //traz a sequencia com base no ID pego da url do site
        $proteinas = $buscaproteina->consultaProteinas(); //fazendo consulta da proteina para jogar no JAVASCRIPT
      
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

<body>

    <header id="cabecalho">
        <a class="menuicon botao-menu" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
            aria-controls="offcanvasExample">
            <img class="imgmenu" src="./assets/menu.png" alt="">
        </a><!--Icone menu-->
        <div class="divtitulo">
            <h1 id="titulo" class="principal">
                Edita sequência
            </h1>
        </div><!--Div titulo-->
        <!--Botão para menu lateral-->

    </header><!--cabecalho-->


    <!--Offcanva-->
    <div class="offcanvas offcanvas-start" style="background-color: #262626; width: 175px;" tabindex="-1"
        id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="offcanvasclose" data-bs-dismiss="offcanvas" aria-label="Close"><img
                    src=".//assets/close.png" alt=""></button>
        </div><!--OFFCANVAS HEADER-->
        <div class="offcanvas-body" style="color: white;">
            <div id="lista-menu">
                <div class="menu-btn"><a class="menu-buttons" href="calculadora.php">Home</a></div>
                <div class="menu-btn border-top "><a class="menu-buttons" href="./logout.php">Sair</a></div>
            </div><!--LISTA MENU-->
        </div><!--OFFCANVAS BODY-->

    </div><!--OFFCANVAS-->
    <div class="corpo">
        <article class="calculadora">

            <div class="descricao-calculadora">
                <p>Edição de sequência<br>
                    -Escreva apenas no campo que você deseja editar;<br>
                    -Caso os dois campos estiverem preenchidos, a sequência não vai editar;<br>
                    -Não deixe os campos vazios.<br>
                </p>
            </div><!--DESCRIÇÃO CALCULADORA-->
            <div class="hr"></div> <!--LINHA PARA QUEBRA-->
            <!--LADO DE CIMA-->

            <form action="edita2.php" method="post" enctype="multipart/form-data"> <!-- começo do forms -->
            <div class="inputbox">
            <div class="input-codex"> <!-- onde as informaçoes estao -->
            <?php
// Verifique se $exibe[1] contém dados

try{
    //tratamento
if (empty($exibe[1])) { //caso o exibe nao retorne o tipo da sequencia, ele gerará um erro
    throw new Exception("Ocorreu um erro insperado. Contate o ADM!");
} else {
   if($exibe[1] == 'DNA'){ //caso a sequencia for DNA, ela vai jogar no edita o valor no campo DNA e deixar o RNA vazio
    echo "<textarea name='input-dna' id='input-dna' class='input-dna' cols='10'
    rows='10'placeholder='Insira a sequência de DNA aqui' onfocus='dnainp()'>$exibe[0]</textarea>";
    echo "<textarea name='input-rna' id='input-rnam' class='input-dna' cols='10'
    rows='10'  placeholder='Insira a sequência de RNA mensageiro aqui' onfocus='rnaminp()'></textarea>";

   }else if($exibe[1] == 'RNA'){ //caso a sequencia for RNA, ela vai jogar o valor no edita o valor do campo RNA e deixar o DNA vazio
    echo " <textarea name='input-dna' id='input-dna' class='input-dna' cols='10'
    rows='10'placeholder='Insira a sequência de DNA aqui' onfocus='dnainp()'></textarea>";
    echo "<textarea name='input-rna' id='input-rnam' class='input-dna' cols='10'
    rows='10'placeholder='Insira a sequência de RNA mensageiro aqui' onfocus='rnaminp()'>$exibe[0]</textarea>";
   }
    
    //a logica é a mesma para outros tipos de botao
}
}catch(Exception $e){
    echo $msg = $e->getMessage();
}//end trycatch
?>
            </div><!--Input-Codex-->
            </div><!--INPUT BOX-->

            <input type="hidden" name="editaidsequencia" value="<?php echo htmlspecialchars($idsequencia) ?>">
            <!--LADO DE BAIXO-->
            <div class="submit">

                <input type="submit" value="Editar sequencia" id="calcular" class="buttonsubmit" name="enviar">
                <!-- BOTAO DE TRANSCREVER A SEQUENCIA. -->

            </div>

            </form>

            <script type="text/javascript">
                var proteinas = <?php echo json_encode($proteinas); ?>;
                //console.log(proteinas);
            </script>
            <script src="javascript/calcula.js"></script>


            <div class="hr"></div> <!--LINHA PARA QUEBRA-->


            <!--LADO DE BAIXO-->
            <div id="resultado">

                <p id="textmt">Escolha o tipo de material genético</p>
                <script src="javascript/dom.js">

</script>
                <div class="resultadodna">
                    <textarea class="output-material" id="na" value="" disabled></textarea>
                </div>

                <p> <a href="pages/rnat.html" class="materiaisg">RNA Transmissor</a></p>
                <div class="resultadodna">
                    <textarea class="output-material" id="idrnat" disabled></textarea>
                </div>


                <p><a href="pages/proteina.html" class="materiaisg">Proteína</a></p>

                <div class="resultadodna">
                    <textarea class="output-material" id="inputproteina"  disabled></textarea> <!-- saida proteina -->
                </div>

            </div>

        </article>
    </div><!--CORPO-->



</body>
</html>