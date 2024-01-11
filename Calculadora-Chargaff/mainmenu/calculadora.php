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
    <link rel="stylesheet" href="./css/tutorial.css">
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
    session_start(); //iniciando a sessão do usuário
    
    if($_SESSION['status'] === 'logado'){ //verifica se o status do usuario é logado

///////////////////////////////////////////////////////////////////////////
        $loginuser = $_SESSION['loginuser']; //o loginuser esta sendo armazenado na variavel para posteriormente ser utilizado para a consulta de ID

        try{
            //inclusao das classes
            include_once('../Classes/Usuario.class.php');
            include_once('../Classes/Sequencia.class.php');
            include_once('../Classes/Proteinas.class.php');

        $usuario = new Usuario(); //instanciando novo usuadio
        $salvar = new Sequencia();//instanciando nova sequencia
        $id = $usuario->consultaId($loginuser); //a procedure salva a sequencia de acordo com o id do usuário
        //a procedure de consulta ID é chamada com base no nome do usuário

        //trqtamento caso $id == null
            if(empty($id) || is_string($id)){ //verifica se o ID é vazio ou se é uma string 
                throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

            }else{//executar normalmente

    foreach($id as $retorno){
        
        //tratamento de erro caso $retorno == null
        if(empty($retorno)){
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

        }else{//retornar normalmente
         $retorno[0]; //retorna o ID do usuário que está logado para a consulta de sequencias
         //aqui é onde manda valor para o botao de ir para a lista das sequencias

            //se retorno não for nulo, ele vai criar cookies com o ID e o login do usuario para ter acesso as "pages"
            setcookie('idusuario',$retorno[0], time() + 3600,'/');
            setcookie('loginusuario',$loginuser,time() + 3600, '/');
            break; //para o loop ao criar os cookies
        }
    }

}
        }catch(Exception $e){
            echo $e ->getMessage();
        }
}else{
    header('Location: ../redireciona/redireciona.php');
}

    
?>


<?php
//php submit
if(isset($_POST['salvar'])){
    try{

        $consulta = new Proteinas(); //instanciando proteinas
        $proteinas = $consulta->consultaProteinas(); //fazendo consulta da proteina para jogar no JAVASCRIPT

        $idloginuser = filter_input(INPUT_POST,'idlogin',FILTER_SANITIZE_SPECIAL_CHARS); //pega a variavel $idloginuser do input hidden
        $dna = strtoupper(filter_input(INPUT_POST,'input-dna',FILTER_SANITIZE_SPECIAL_CHARS)); //pega os dados digitados pelos usuários no campo input-dna
        $rna = strtoupper(filter_input(INPUT_POST,'input-rna',FILTER_SANITIZE_SPECIAL_CHARS)); //pega os dados digitados pelos usuários no campo input-rna
        
        //tratamento caso $idloginuser seja vazio
        if(empty($idloginuser)){
         throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");//gera um erro
     
        }else{ //executa o programa normalmente
     
         //verifica se os dois campos foram preenchidos juntos
     if(!$dna == null && !$rna == null){
         echo "Digite apenas em um dos campos.";
     
     }else{//caso haja só um ele executará normalmente
     
        if(empty($dna)){ //se o campo de DNA for vazio, o programa vai entender que o usuário desejará salvar o RNA
         if(!$rna == null){ //se o RNA não for vazio, ele chamará a função
             echo $salvar->insereSequencia(htmlspecialchars($rna),'RNA',htmlspecialchars($idloginuser));
             
         }else{ //se for vazio, ele exibirá uma mensagem para que o usuário digite alguma sequencia
          throw new Exception("Insira uma sequência nos campos DNA ou RNA.");
         }
        }else{
     
         //se o DNA não for vazio, o programa entende que o usuário desejará salvar o DNA
         echo $salvar->insereSequencia(htmlspecialchars($dna),'DNA',htmlspecialchars($idloginuser));
         //a sequencia é inserida com seu tipo e com o id do usuário, para quando o usuário
         //desejar ver a listagem de suas sequencias, o id é quem retorna.
        }
     }
        }
     
     }catch(Exception $e){
         echo $msg = $e->getMessage();
     }
     
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
                Calculadora de Chargaff
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
        <div class="menu-btn"><a class="menu-buttons" href="calculadora.php">Home</a></div>
            <div id="lista-menu">
                <!--<div class="menu-btn"><a class="menu-buttons" href="index.html">Home</a></div>-->
                <div class="menu-btn border-top"><!-- aqui vai para a lista das sequências -->
                <?php  //botao que direciona para lista das sequencias
                    try{

                    //tratamento de erro para checar se $retorno foi enviada com valor
                    if(isset($retorno[0])){

                        //anchor mandando para a pagina do lista sequencia com base no ID do usuário logado
                        echo "<a class='menu-buttons'href='listasequencia.php?codigo=" . htmlspecialchars($retorno[0]) . "'>Sequencias</a>";
                    }else{
                        throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
                        }
                    }catch(Exception $e){
                        echo $msg = $e->getMessage();
                    }
                ?>
                </div> <!-- ir para página das listas --> <!-- end div botao sequencias -->
                <div class="menu-btn border-top "><a class="menu-buttons" href="./logout.php">Sair</a></div>
            </div><!--LISTA MENU-->
        </div><!--OFFCANVAS BODY-->

    </div><!--OFFCANVAS-->
    <div class="corpo">
        <article class="calculadora">

            <div class="descricao-calculadora">
                <p>Como realizar a trascrição: <br>
                    -Escreva a sequência apenas no campo desejado; <br>
                    -A sequência será salva e poderá ser consultada ao clicar no ícone do canto superior esquerdo da página;<br>
                    -DNA: A &rarr; T | C &rarr; G e vice-versa;<br>
                    -RNA: A &rarr; U | C &rarr; G e vice-versa.<br>
                </p>
            </div><!--DESCRIÇÃO CALCULADORA-->
            <div class="hr"></div> <!--LINHA PARA QUEBRA-->
            <!--LADO DE CIMA-->

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> <!-- começo do forms -->

            <!-- é necessário haver um input type hidden para enviar o idloginuser ao submeter o form-->
            <input type="hidden" name="idlogin" value="<?php echo isset($retorno[0]) ? htmlspecialchars($retorno[0]) : "Ocorreu um erro inesperado."; ?>">

            <div class="inputbox">
                <div class="input-codex"> <!-- onde as informaçoes estao -->

                
                    <textarea name="input-dna" id="input-dna" class="input-dna" cols="10" onfocus="dnainp()"
                    rows="10"  placeholder="Insira a sequência de DNA aqui"><?= isset($dna) ? $dna : null; ?></textarea>
                    <!-- AQUI ENTRA O DNA -->

                    <textarea name="input-rna" id="input-rnam" class="input-dna" cols="10" onfocus="rnaminp()"
                    rows="10"  placeholder="Insira a sequência de RNA mensageiro aqui"><?= isset($rna) ? $rna : null; ?></textarea>
                    <!-- AQUI ENTRA O RNA -->
                    
                </div><!--Input-Codex-->
            </div><!--INPUT BOX-->

            

            <!--LADO DE BAIXO-->
            <div class="submit">

                <input type="submit" value="Transcrever sequência" id="calcular" class="buttonsubmit" name="salvar">
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

                <p> <a href="pages/rnat.php" class="materiaisg">RNA Transmissor</a></p>
                <div class="resultadodna">
                    <textarea class="output-material" id="idrnat" disabled></textarea>
                </div>


                <p><a href="pages/proteina.php" class="materiaisg">Proteína</a></p>

                <div class="resultadodna">
                    <textarea class="output-material" id="inputproteina"  disabled></textarea> <!-- saida proteina -->
                </div>

            </div>

        </article>
    </div><!--CORPO-->
    <div class="corpo">
        <div class="corpomobile">

            <div class="espaco1">
                <div class="fotochargaff">
                    <div class="bola-chargaff"> <img src="assets/foto_chargaff.png" alt="Erwin chargaff" id="erwin">

                    </div>
                </div><!--FOTO CHARGAFF-->
            </div><!--ESPAÇO 1-->
            <div class="chargaff">
                <div class="quadrado">
                </div>
                <div class="titleerwin">
                    <h3>Quem foi Erwin Chargaff?</h3>
                </div><!--Title Erwin-->
                <div class="textcima" align="justify">
                    <p>&emsp;&emsp;&emsp;Erwin chargaff foi um Bioquímico Austro-Húngaro, naturalizado nos Estados
                        Unidos nascido em Czernowitz, que hoje faz parte da Ucrânia, em 11 de agosto de 1905 e morreu
                        aos 96 anos, em 20 de junho de 2002, conhecido mundialmente por conta de suas descobertas
                        fundamentais para a compreensão das estruturas do DNA e por suas contribuições significativas
                        para a bioquímica e a genética. </p>
                </div><!--TEXTO CIMA-->
                <div class="textbaixo" align="justify">
                </div><!--TEXTO CIMA-->
                <a href="pages/erwin.php    "><button class="erwinbtn" id="erwinbtn">Clique aqui para saber
                        mais</button></a>
            </div><!--CHARGAFF-->
        </div><!--CORPO MOBILE-->
    </div><!--CORPO-->

    <div class="corpo">
    <div class="guia">
            <header class="titleguia">
                <h3 class="titlecomo">Como fazer a transcrição?</h3>
            </header>
            <div class="hr"></div>
            <div class="corpoguia">
                <p class="textguia">&emsp;&emsp;&emsp;O código genético é um sistema de tradução que possui a relação entre a sequência de bases nitrogenadas do DNA e a sequência correspondente de aminoácidos que compõem a proteína. As pessoas possuem 46 moléculas de DNA, e nessas moléculas estão os nossos genes; cada um guarda informação para que nosso corpo produza uma proteína. No entanto, para produzir proteínas, nós precisamos dos aminoácidos, pois para formar a proteína é necessário um conjunto de aminoácidos. Todas as informações que estão no DNA são expressadas a partir da proteína, diferenciando cada pessoa pela mudança de DNA, modificando as proteínas para serem diferentes, mostrando que o código genético é universal, independente do ser vivo, sempre se encaixando na tabela de aminoácidos.</p>
                <p class="textguia">&emsp;&emsp;&emsp;O código genético é a linguagem na qual ele pega as letrinhas e, a partir da combinação diferente dessas 3 letras, é formado e encaixado um aminoácido na proteína. Para encontrar o códon na tabela do código genético, basta entender que ela é dividida em 3 bases, e é em cada base dessa que irá procurar pelo aminoácido. Por exemplo, suponhamos que a trinca de letras ficou em AUC; começamos verificando pela base da esquerda que guarda a primeira letra (A). Ao achar, iremos para a segunda base que é a de cima, que guarda a segunda letra (U), faltando só a última letra. Ela é localizada no lado direito guardando a letra (C). Após fazer essa "batalha naval" de Códon, é encontrado Isoleucina como aminoácido dessa trinca, e essa regra se repete. Todas as 3 primeiras letrinhas do RNAm serão AUG, com o primeiro aminoácido transformando-se em metionina.</p>
                <p class="textguia">&emsp;&emsp;&emsp;Sempre os códons se iniciam pela metionina (AUG) e sempre vão terminar nos Códons de fim ou parada, sendo eles UAA, UAG e UGA. Ao todo, a tabela tem 4 bases nitrogenadas, 20 aminoácidos diferentes e 64 Códons.</p>
            </div>
            <div class="hr"></div>
 
            <div class="titleguia">
                <h3 class="titlecomo2">Como fazer a transcrição manualmente em 3 passos</h3>
            </div>
            <div class="corpoguia">
                <p class="textguia">&emsp;&emsp;&emsp;Para ocorrer a síntese de proteínas, é necessário que aconteça um processo de transcrição, em que a informação genética no DNA é traduzida para RNA mensageiro, e por fim transcrita novamente para uma sequência de aminoácidos que formam a proteína, aprenda a fazer esse processo manualmente em três passos:</p>
                <div class="br"></div>
                <p class="textguia" >&emsp;&emsp;&emsp;<b>1 - DNA para RNA mensageiro:</b></p>
                <p class="textguia">&emsp;&emsp;&emsp;O DNA está no núcleo da célula, porém a síntese das proteinas acontece no ribossomo, outra estrutura da célula, então uma enzima chamada de RNA mensageiro lê a sequência do DNA para levar ao ribossomo a indormação genética.</p>
                <p class="textguia">&emsp;&emsp;&emsp;Para a leitura da sequência das bases nitrogenadas do DNA, o RNAm realiza um processo de transcrição, onde adenina(A) é trasncrita para uracila(U), timina(T) para adenina(A), guanina(G) para citosina(C) e citosina(C) para guanina(G), que é a regra de Chargaff, como na imagem a seguir:</p>
                <div class="fotos">
                    <img src="assets/a-t-c-g.png" alt="a t c g">  
                </div>
                <div class="br"></div>
                <p class="textguia">&emsp;&emsp;&emsp;Então o RNA mensageiro parte aos ribossomos.</p>
                <div class="br"></div>
                <div class="br"></div>
                <p class="textguia" >&emsp;&emsp;&emsp;<b>2 - RNA mensageiro para RNA transmissor:</b></p>
                <p class="textguia">&emsp;&emsp;&emsp;Ao chegar no ribossomo, o RNA mensageiro é transcrito novamente, porém para RNA transmissor, conforme mostra a imagem a seguir: </p>
                <div class="fotos">
                    <img src="assets/ribossomo.png" alt="ribossomo">  
                </div>
                <div class="br"></div>
                <p class="textguia">&emsp;&emsp;&emsp;Com isso, ocorre novamente a regra de Chargaff, porém sem a timina(T), então a uracila(U) vira adenina(A) e adenina vira uracila(U), na seguinte regra:</p>
                <div class="fotos">
                    <img src="assets/a-u-u-a.png" alt="a u u a">  
                </div>
                <div class="br"></div>
                <p class="textguia">&emsp;&emsp;&emsp;Essa ligação peptídica entre os aminoácidos forma uma cadeia polipeptídica.</p>
                <div class="br"></div>
                <div class="br"></div>
                <p class="textguia" >&emsp;&emsp;&emsp;<b>3 - A síntese das proteínas:</b></p>
                <p class="textguia">&emsp;&emsp;&emsp;Cada três sequências de bases nitrogenadas (A, U, G, C) forma um códom. Esses códons viram aminoácidos e os aminoácidos formam as proteínas.</p>
                <p class="textguia">&emsp;&emsp;&emsp;A seguinte imagem apresenta uma tabela onde é apresentado como ocorre a transformação dos códons em proteína.</p>
               
                <div class="fotos">
                    <img src="assets/tabela.png" alt="tabela">  
                </div>
                <div class="br"></div>
                <p class="textguia">&emsp;&emsp;&emsp;Para localizar um aminoácido, é necessário separá-lo em suas três bases nitrogenadas, como exemplo, será utilizado a sequência CAU, que ao separar, temos as bases C, A e U, respectivamente. A primeira base nitrogenada está na linha da esquerda, representada pela cor vermelha, como no exemplo da sequência CAU, a primeira letra é C, então o aminoácido estará na linha onde as bases começam com C. </p>
                <p class="textguia">&emsp;&emsp;&emsp;A próxima base é representada pela letra A, então é necessário olhar para as colunas, que aqui estão representadas em amarelo. Fazendo uma espécie de "batalha naval" e cruzando as duas informações referentes a linha e coluna, é possível encontrar um bloco formado pelas bases CAU, CAC, CAA e CAG.</p>
                <p class="textguia">&emsp;&emsp;&emsp;Por fim, é necessário olhar para as linhas da direita, representadas em azul, onde se deve procurar a última letra, que no caso é U.</p>
                <p class="textguia">&emsp;&emsp;&emsp;Com isso, é possível ver que o códom CAU origina o aminoácido histidina.</p>
                <p class="textguia">&emsp;&emsp;&emsp;Portanto, para uma sequência de códons, é necessário fazer essa regra várias vezes, até chegar no FIM, que é o término da transcrição.</p>
            </div>
        </div><!--Guia-->
    </div><!--Corpo-->
    <footer class="rodape" style="background-color: #262626;">
        Rodape
    </footer>


</body>
</html>