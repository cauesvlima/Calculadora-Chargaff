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
                    Erwin Chargaff
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
                        <div class="bola-chargaff">  <img src="../assets/foto_chargaff.png" alt="Erwin chargaff" id="erwin">
                        
                    </div>
                    </div><!--FOTO CHARGAFF-->
                </div><!--ESPAÇO 1-->
                <div class="chargaff biografiacgf">
                    <div class="quadrado">
                    </div>
                    <div class="titleerwin" style="font-size: 5.5vh;">
                      <h3>Quem foi Erwin Chargaff?</h3>  
                    </div><!--Title Erwin-->
                    <div class="textcima" >
                        <p>&emsp;&emsp;&emsp;Erwin chargaff foi um Bioquímico Austro-Húngaro, naturalizado nos Estados Unidos nascido em Czernowitz, que hoje faz parte da Ucrânia, em 11 de agosto de 1905 e morreu aos 96 anos, em 20 de junho de 2002, conhecido mundialmente por conta de suas descobertas fundamentais para a compreensão das estruturas do DNA e por suas contribuições significativas para a bioquímica e a genética. </p>
                        </div><!--TEXTO CIMA-->
                        <div class="br"></div>
                        <div class="textbaixo">
                            
                        <div class="br"></div>
                            <h3 style="font-size: 5.5vh; display: flex; justify-content: center;">Biografia</h3>
                            <div class="hr"></div>
                            
                        <div class="br"></div>
                            <h3 class="h3biografia">Infância</h3>
                            <p>&emsp;&emsp;&emsp;Nascido em 1905, em Czernowitz, que na época fazia parte da Áustria-Hungria (que hoje faz parte da Ucrânia), a infância de Erwin Chargaff ocorreu em um período de grande mudança, pois passou pela Primeira Guerra Mundial, e a dissolução do império Austro-Húngaro.</p>
                            
                        <div class="br"></div>
                            <h3 class="h3biografia">Vida acadêmica e profissional</h3>
                            <p>&emsp;&emsp;&emsp;Estudou química na Universidade de Viena, área que em 1928 obteve seu doutorado. Após obter o seu doutorado em Viena, Chargaff conduziu pesquisas em bioquímica na universidade de Yale, nos Estados Unidos, por volta da década de 1930.</p>
                            
                            <div class="fotos">
                            <img src="../assets/yale.jpg" alt="Universidade de Yale">
                            </div>
                            <div class="descricao-img">
                            <p> Universidade de Yale</p>
                            </div>
                            <p>&emsp;&emsp;&emsp;Também na década de 1930, Chargaff Trabalhou no Instituto Pasteur, em París, período que foi importante por contribuir no conhecimento de Erwin na área de bioquímica e biologia molecular.</p>
                            <p>&emsp;&emsp;&emsp;É importante lembrar que em sua carreira como cientista, Erwin passou por diversas instituições, com o objetivo de novas oportunidades de busca de conhecimento, pesquisas e colaborações.</p>
                            <p>&emsp;&emsp;&emsp;Após o tempo que Chargaff ficou no instituto pasteur, ele continuou suas pesquisas e na década de 1940 lecionou e conduziu pesquisas sobre bioquímica e genética na Universidade de Nova York (NYU), onde passou um tempo significativo.</p>
                            <p>&emsp;&emsp;&emsp;Durante as décadas de 1950 e 1960, Erwin Chargaff trabalhou na universidade de Columbia, em Nova York, Estados Unidos, período marcado por grandes e significativas contribuições que Chargaff teve para o campo de genética molecular e suas pesquisas em bioquímica. </p>
                            <div class="fotos">
                            <img src="../assets/columbia.jpg" alt="Watson e Crick">   
                                
                               </div><div class="descricao-img">
                                   <p> Universidade de Columbia, Nova York</p>
                                   </div>
                            <p>&emsp;&emsp;&emsp;Nessa época, o bioquímico investigou a composição das bases nitrogenadas do DNA, colaborando com outros grandes cientistas como Francis Crick e James Watson, que trabalhavam na estrutura do DNA. Foi nesse período em que estabeleceu a Regra de Chargaff, que foram fundamentais para a confirmação do modelo de dupla hélice do DNA, proposto por esses cientistas. Essas contribuições foram muito importantes na revolução da genética molecular e na compreensão da estrutura de dupla hélice, que tornou Chargaff muito influente entre os cientistas ao longo da sua carreira.</p>
                            <div class="fotos">
                                <img src="../assets/duplahelice.jpg" alt="Imagem DNA hupla hélice">   
                               </div>
                               <div class="descricao-img">
                                <p> Dna Dupla hélice</p>
                                </div>
                            <p>&emsp;&emsp;&emsp;Por fim, em 1967, Erwin Chargaff trabalhou na Universidade de Basileia, na Suíça, onde posteriormente viria a se aposentar, em 1970.</p>
                            
                            <div class="fotos">
                             <img src="../assets/chargaffimg.webp" alt="Erwin Chargaff jovem">   
                             
                            </div><div class="descricao-img">
                                <p> Erwin Chargaff</p>
                                </div>
                            <h3 class="h3biografia">Principais contribuições de Erwin Chargaff</h3>
                            <p>&emsp;&emsp;&emsp;Enquanto esteve na Universidade de Yale e no Instituto Pasteur, na década de 1930, Erwin Chargaff realizou diversas contribuições importantes, como sua pesquisa em Ácidos Nucleicos (macromoléculas que formam o DNA e o RNA), pesquisa esta que foi importante para estabelecer a importância dos Ácidos Nucleicos em processos biológicos fundamentais. Também desenvolveu métodos de análise em bioquímica que abriram as portas para descobertas à proporção de bases no DNA.</p>
                            <p>&emsp;&emsp;&emsp;Já na Universidade de Nova York, Chargaff explorou mais à composição dos ácidos nucleicos. Além disso, ele fez uma das descobertas mais importantes de sua carreira, o bioquímico observou que as quantidades de adenina eram aproximadamente iguais às de timina e que as quantidades de guanina eram aproximadamente iguais às de citosina, descoberta que posteriormente o levariam ao desenvolvimento das Regras de Chargaff.</p>
                            <p>&emsp;&emsp;&emsp;É importante lembrar que adenina, timina, guanina e citosina são bases nitrogenadas (compostos que contêm átomos de nitrogênio) que compõem o DNA.</p>
                            <p>&emsp;&emsp;&emsp;Durante a época em que Chargaff trabalhou na Universidade de Colúmbia, o cientista estabeleceu as Regras de Chargaff, um de seus feitos mais notórios, que desempenharam um papel crucial para a validação de modelo do DNA em dupla hélice, de James Watson e Francis Crick.</p>
                            <div class="fotos">
                                <img src="../assets/watsoncrick.jpg" alt="Watson e Crick">   
                                
                               </div><div class="descricao-img">
                                   <p> James Watson e Francis Crick ao lado de uma maquete de DNA</p>
                                   </div>
                            <p>&emsp;&emsp;&emsp;Por fim, na Universidade de Basileia, Chargaff contribuiu para a formação de diversas gerações de cientistas e reforçou suas regras já estabelecidas.</p>
                            
                        </div><!--TEXTO CIMA-->
                        <div class="br"></div>
                </div><!--CHARGAFF-->
            </div><!--CORPO MOBILE-->
        </div><!--CORPO-->
        
</body>
</html>