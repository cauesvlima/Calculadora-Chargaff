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
                    DNA

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
                <div class="menu-btn border-top "><a class="menu-buttons" href="../logout.php">Sair</a></div>
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
                      <h3>O que é o DNA?</h3>  
                    </div><!--Title Erwin-->
                    <div class="textcima" >
                        <p>&emsp;&emsp;&emsp;O DNA, ou ácido desoxirribonucleico, é o material que contém todas as informações sobre um ser vivo e como o organismo deste funciona. Ele determina em seres humanos, por exemplo, coisas como a cor dos olhos e como os órgãos trabalham. Cada informação contida em nosso DNA é carregada por seções diferentes chamadas de genes.</p>
                        </div><!--TEXTO CIMA-->
                        <div class="br"></div>
                        <div class="textbaixo">
                            
                        <div class="br"></div>
                            <p class="my-2">&emsp;&emsp;&emsp;O DNA está presente em todas as células do nosso corpo e nelas ele se apresenta em agrupamentos chamados de cromossomos. Lá, ele se organiza em estruturas compostas por quatro bases nitrogenadas, um grupo fosfato e uma pentose. </p>
                            <p class="my-2">&emsp;&emsp;&emsp;Imaginemos que vamos construir essas estruturas com peças de lego, nos baseando na aparência do DNA quando o olhamos por um microscópio; Ele se parece com uma escada torcida onde cada lado da escada é uma fita e os degraus (que são as bases nitrogenadas) são formados por duas peças coloridas diferentes, os nucleotídeos que por sua vez são chamados de A para Adenina, T para Timina, C para Citosina e G para Guanina.  </p>
                            <div class="fotos">
                                <img src="../assets/duplahelice.jpg" alt="Imagem DNA hupla hélice">   
                               </div>
                               <div class="descricao-img">
                                <p> Modelo de DNA</p>
                                </div>
                            <p class="my-2">&emsp;&emsp;&emsp;Nas células, para que as estruturas sejam criadas, precisamos da ação conjunta de várias enzimas e durante o processo, erros podem ocorrer. </p>
                            <p class="my-2">&emsp;&emsp;&emsp;Quando nenhum erro ocorre, o DNA terá as informações corretas e o funcionamento do organismo será adequado, já que ele auxilia as células a produzirem substâncias denominadas proteínas, que as células precisam para viver. Ele também permite que os seres vivos se reproduzam, passando traços dos pais para os filhos.</p>
                            <p class="my-2">&emsp;&emsp;&emsp;Agora, imagine que uma peça do nosso DNA de lego foi montada errada: dependendo da peça, pode ser que o impacto seja mínimo ou nem exista, porém o erro pode ser mais grave e dessa forma, afetar o organismo inteiro. Quando erros ocorrem no DNA, os intitulamos mutações, que se forem significativas, podem causar doenças e outros problemas</p>
                            
                            
                        
                            <div class="br"></div>
                            <h3 class="h3biografia">Quais são as funções do DNA?</h3>
                            <p>&emsp;&emsp;&emsp;As funções principais do DNA é armazenar, transmitir e codificar informações genéticas para a síntese de proteínas, portanto, o bom funcionamento do organismo.</p>
                            <p>&emsp;&emsp;&emsp;Uma das funções do DNA é a replicação, pode se duplicar, possibilitando que uma célula se divida e transmita as suas informações genéticas para as células filhas. Ocorre para crescimento e regulamento de tecidos do corpo.</p>
                            <p>&emsp;&emsp;&emsp;O DNA também é responsável pela hereditariedade, ele carrega informações genéticas de geração em geração, possibilitando a transmissão de características e traços genéticos dos pais para os filhos, como cor do cabelo, altura, cor dos olhos, predisposição para algumas condições de saúde, doenças genéticas entre outros.</p>
                            
                            <p>&emsp;&emsp;&emsp;O DNA contém sequências de nucleotídeos (unidades que compõem as moléculas de DNA e RNA, são compostos por bases nitrogenadas, açúcar e grupo fosfato) que codificam as instruções para a formação das proteínas. Cada três nucleotídeos forma um códon, que ao serem transcritos, correspondem a um aminoácido, que são “tijolos” quem compõem as proteínas. Ou seja, a sequência dos códons do DNA irá determinar a sequência dos aminoácidos, portanto, da proteína. </p>
                            <p>&emsp;&emsp;&emsp;Como é possível perceber, o DNA possui diversas funções essenciais para o bom funcionamento dos organismos.</p>
                            

                            <div class="br"></div>
                            <h3 class="h3biografia">O que forma o DNA?</h3>
                            <p>&emsp;&emsp;&emsp;Como foi citado anteriormente, o DNA as unidades básicas que formam o DNA são os nucleotídeos. Que são compostos por:</p>
                            <p>&emsp;&emsp;&emsp;<b>Base Nitrogenada: </b> como já foi citado, as bases nitrogenadas são a adenina (A), timina(T), citosina (C) e guanina (G). A sequência dessas bases nitrogenadas irá determinar qual proteína será sintetizada.  Já no RNA, a timina é substituída pela uracila(U). </p>
                            <div class="fotos">
                                <img src="../assets/dnaform.jpg" alt="Imagem DNA hupla hélice">   
                               </div>
                               <div class="descricao-img">
                                </div>
                            <p>&emsp;&emsp;&emsp;Em 1950, o bioquímico Erwin Chargaff publicou uma descoberta derivada de suas observações referente as quantidades relativas às bases nitrogenadas no DNA. Ele observou que as quantidades de adenina eram aproximadamente iguais às de timina, e que as quantidades de citosina eram aproximadas as de guanina no DNA de diversas espécies. Essa observação ficou conhecida como Regras de Chargaff e possibilitaram os estudos da transcrição do DNA.</p>
                            
                            <p>&emsp;&emsp;&emsp;<b>Pentose: </b> o segundo elemento é uma molécula chamada pentose. No DNA a pentose é desoxirribose.</p>
                            <p>&emsp;&emsp;&emsp;<b>Grupo fosfato: </b> eles servem na formação de ligações covalentes entre os nucleotídeos adjacentes, os conectando em uma longa cadeia.</p>
                            
                        <div class="br"></div>
                </div><!--CHARGAFF-->
            </div><!--CORPO MOBILE-->
        </div><!--CORPO-->
        
</body>
</html>