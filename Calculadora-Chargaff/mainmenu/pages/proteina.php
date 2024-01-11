<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biografia de Chargaff</title>
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Importação de css personalizado-->
    <link rel="stylesheet" href="../css/style.css">
    <!--Importação bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <style>
        
        .corpo{
            margin-left: -8vh;
        }
        
        #prote{
            position:absolute;
            z-index: 1;
            height: 26vh;
        }
        @media (max-width:1100px){
            
        .corpo{
            margin-left: 0vh;
        }
        }
    </style>

<?php

//recebe os cookies pára o usuário acessar esta página do site
//o if ja verifica se os dois campos possuem valores
if(isset($_COOKIE['idusuario']) && isset($_COOKIE['loginusuario'])){
    
$id = filter_input(INPUT_COOKIE, 'idusuario', FILTER_SANITIZE_NUMBER_INT); //sanitizando cookie idusuario
$login = filter_input(INPUT_COOKIE, 'loginusuario', FILTER_SANITIZE_SPECIAL_CHARS); //sanitizando cookie loginusuario
//esses cookies estao sendo criados na "calculadora.php", pois é lá que estarao esses dois dados

// Agora você pode usar $id e $login conforme necessário
} else {
header('Location: redireciona.php'); //joga para um redireciona que está na pasta "pages" esse redireciona joga o usuário para a página de login novamente
}


?>
</head>
<body>
    <header id="cabecalho">
        <a class="menuicon botao-menu" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <img class="imgmenu" src="../assets/menu.png" alt="">
        </a><!--Icone menu-->
        <div class="divtitulo">
            <h1 id="titulo" class="principal">
                    Proteínas

            </h1>
        </div><!--Div titulo-->
    </header><!--cabecalho-->
      <!--Offcanva-->
      <div class="offcanvas offcanvas-start" style="background-color: #262626; width: 175px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">  
        <div class="offcanvas-header">
              <button type="button" class="offcanvasclose" data-bs-dismiss="offcanvas" aria-label="Close"><img src="../assets/close.png" alt=""></button>
            </div><!--OFFCANVAS HEADER-->
            <div class="offcanvas-body" style="color: white;">
            <div id="lista-menu">
                <div class="menu-btn"><a class="menu-buttons" href="../calculadora.php">Home</a></div>
                <div class="menu-btn border-top"> <!-- div btn sequencias -->
                    <?php  //botao que direciona para lista das sequencias
                    try{

                    //tratamento de erro para checar se $id foi enviada com valor
                    if(isset($id)){

                        //anchor mandando para a pagina do lista sequencia com base no ID do usuário logado (neste caso, ele pega o ID obtido pelo cookie)
                        echo "<a class='menu-buttons'href='../listasequencia.php?codigo=" . htmlspecialchars($id) . "'>Sequencias</a>";
                    }else{
                        throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
                        }
                    }catch(Exception $e){
                        echo $msg = $e->getMessage();
                    }
                ?>
                </div>
                <div class="menu-btn border-top "><a class="menu-buttons" href="redireciona.php">Sair</a></div>
            </div><!--LISTA MENU-->
        </div><!--OFFCANVAS BODY-->
        
    </div><!--OFFCANVAS-->

        <div class="corpo" style="margin-top: 10vh;">
            <div class="corpomobile">
                
                <div class="espaco1">
                    <div class="fotochargaff">
                        <div class="bola-chargaff">  <img src="../assets/faixa-de-dna (1).png" alt="Erwin chargaff" id="prote">
                        
                    </div>
                    </div><!--FOTO CHARGAFF-->
                </div><!--ESPAÇO 1-->
                <div class="chargaff biografiacgf">
                    <div class="quadrado">
                    </div>
                    <div class="titleerwin" style="font-size: 5.5vh;">
                      <h3>O que são proteínas?</h3>  
                    </div><!--Title Erwin-->
                    <div class="textcima" >
                        <p>&emsp;&emsp;&emsp;As proteínas são macromoléculas compostas por sequências de aminoácidos, cada uma delas possui uma sequência específica de aminoácidos que irão determinas qual é o tipo de proteína formada. Elas são essencias para a vida por desempenharem diversas funções que são vitais nos organismos.</p>
                        </div><!--TEXTO CIMA-->
                        <div class="br"></div>
                        <div class="textbaixo">
                            
                        <div class="br"></div>
                            <h3 style="display: flex; justify-content: center;">Funções das próteínas</h3>
                            <p>&emsp;&emsp;&emsp;Algumas funções das proteínas são:</p>
                            <p class="my-2">&emsp;&emsp;&emsp;<b>Estrutural:</b> Uma das funções das proteínas no organismo é a formação e manutenção das células, tecidos e órgãos. Um exemplo é a queratina, uma proteína que compõe a estrutura das unhas e cabelo; </p>
                            <p class="my-2">&emsp;&emsp;&emsp;<b>Transporte:</b>  Possuem a função de transportar substâncias e moléculas essenciais, como é o caso da hemoglobina que atua no transporte de oxigênio pelo corpo;  </p>
                            <p class="my-2">&emsp;&emsp;&emsp;<b>Enzimática: </b>  Enzimas são proteínas catalizadoras de reações químicas, acelerando essas reações e permitindo que elas ocorram em velocidades compatíveis com a vida;</p>
                            <p class="my-2">&emsp;&emsp;&emsp;<b>Movimento: </b>  As proteínas contráteis permitem o movimento muscular, elas são. importantes para a contração muscular, como a miosina e actina; </p>
                            <p class="my-2">&emsp;&emsp;&emsp;<b>Defesa: </b>  Os anticorpos são proteínas no sistema imunológico com a função de combater doenças e infecções, elas alertam ao sistema imunológico o que se deve combater;</p>
                            <p class="my-2">&emsp;&emsp;&emsp;<b>Sinalização: </b>  A sinalização é um processo que permite a comunicação entre as células e elas responderem a estímulos, como a insulina, hormônio que desempenha um papel fundamental na regulação de processos fisiológicos, transportando o açucar do sangue pelo corpo para que ele seja posteriormente energia</p>
                            <p class="my-2">&emsp;&emsp;&emsp;<b>Armazenamento: </b>  Algumas proteínas armazenam nutrientes, como a caseína no leite, que é uma fonte de aminoácidos para os bebês;</p>
                            
                        <div class="br"></div>
                            <h3 class="h3biografia">Como elas são formadas?</h3>
                            <p>&emsp;&emsp;&emsp;As proteínas possuem estruturas tridimensionais que são determinadas pelas sequências  de aminoácidos.</p>
                            
                            <div class="fotos">
                            <img src="../assets/proteina.png" alt="Estrutura tridimensional da proteína">
                            </div>
                            <div class="descricao-img">
                            <p> Estrutura tridimensional da proteína</p>
                            </div>
                            <p>&emsp;&emsp;&emsp;Mas o que são aminoácidos?</p>
                            <p>&emsp;&emsp;&emsp;Aminoácidos são pequenas moléculas que se formam as proteínas do nosso corpo ao se unirem. São como tijolos que juntos formam uma casa, a proteína</p>
                            <p>&emsp;&emsp;&emsp;Existem 20 tipos diferentes de aminoácidos que podem se unir de diversas maneiras e formam diferentes proteínas, cada uma delas desempenhando um papel diferente no organismo</p>
                            
                            <p>&emsp;&emsp;&emsp;As proteínas são formadas por cadeias de aminoácidos, ligados entre sí por ligações peptídicas. Uma cadeia de aminoácidos juntos por essas ligações peptídicas forma um peptídeo, que em grande quantidade possue o nome de polipeptídeo. Polipeptídeo é a designação mais geral raferindo-se a cadeia de aminoácidos e pode ser utilizado para descrever peptídeos de tamanhos maiores.</p>
                            <p>&emsp;&emsp;&emsp;Porém um polipeptídeo geralmente possui menos de cinquenre aminoácidos em sua sequência, pois quando um ele atinge um nível de complexibilidade funcional e estrutura, se torna uma proteína. Então no fundo, as proteínas são formadas por conjuntos de aminoácidos organizados de maneira funcional. </p>
                            <p>&emsp;&emsp;&emsp;Seguindo a analogia da casa, os peptídeos são como pequenos trechos de tijolos, enquanto polipeptídeo são trechos maiores.</p>
                            
                        <div class="br"></div>
                        <p>&emsp;&emsp;&emsp;As proteínas são formadas por sequências de aminoácidos, esses aminoácidos são compostos por bases nitrogenadas formadas em códons, que são decodificadas e compõem esses aminoácidos, na tabela a seguir é possível ver que as bases nitrogenadas, adenina (A), uracila(U), citosina (C) e guanina (G) são transcritas em aminoácidos.</p>
                            
                            <div class="fotos">
                            <img src="../assets/tabela.png" alt="Watson e Crick">   
                                
                               </div><div class="descricao-img">
                                   <p> Tabela dos aminoácidos</p>
                                   </div>
                            
                        </div><!--TEXTO CIMA-->
                        <div class="br"></div>
                </div><!--CHARGAFF-->
            </div><!--CORPO MOBILE-->
        </div><!--CORPO-->
        
</body>
</html>