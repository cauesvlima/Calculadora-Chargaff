<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"  initial-scale=1.0">
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
            <div id="lista-menu">
                <div class="menu-btn"><a class="menu-buttons" href="index.html">Home</a></div>
                <div class="menu-btn border-top"><a class="menu-buttons" href="pages/login.html">Entrar</a></div>
                <div class="menu-btn border-top "><a class="menu-buttons" href="pages/menu.html">Menu</a></div>
            </div><!--LISTA MENU-->
        </div><!--OFFCANVAS BODY-->

    </div><!--OFFCANVAS-->
    <div class="corpo">
        <article class="calculadora">

            <div class="descricao-calculadora">
                <p>Como realizar a trascrição: <br>
                    -Selecione o tipo de material genético que se deseja transcrever em outro; <br>
                    -Digite a sequência do Material genético que deseja-se transcrever; <br>
                    -Selecione o tipo de material genético que deseja-se obter por meio da transcreição. <br>
                </p>
            </div><!--DESCRIÇÃO CALCULADORA-->
            <div class="hr"></div> <!--LINHA PARA QUEBRA-->
            <!--LADO DE CIMA-->

            <div class="inputbox">
                <div class="input-codex">

                    <textarea name="input-dna" id="input-dna" class="input-dna" cols="10"
                    rows="10"  placeholder="Insira a sequência de DNA aqui"></textarea>

                    <textarea name="input-rna" id="input-rnam" class="input-dna" cols="10"
                    rows="10"  placeholder="Insira a sequência de RNA mensageiro aqui"> </textarea>

                </div><!--Input-Codex-->
            </div><!--INPUT BOX-->



            <!--LADO DE BAIXO-->
            <div class="submit">

                <input type="submit" value="Transcrever sequência" id="calcular" class="buttonsubmit">

            </div>

            <script src="javascript/calcula.js"></script>


            <div class="hr"></div> <!--LINHA PARA QUEBRA-->



            <!--LADO DE BAIXO-->
            <div id="resultado">

                <p id="textmt">Escolha o tipo de material genético</p>
                <div class="resultadodna">
                    <textarea class="output-material" id="na" value="" disabled></textarea>
                </div>

                <p> <a href="pages/rnat.html" class="materiaisg">RNA Transmissor</a></p>
                <div class="resultadodna">
                    <textarea class="output-material" id="idrnat" disabled></textarea>
                </div>


                <p><a href="pages/proteina.html" class="materiaisg">Proteína</a></p>

                <div class="resultadodna">
                    <textarea class="output-material" disabled></textarea>
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
                <a href="pages/erwin.html"><button class="erwinbtn" id="erwinbtn">Clique aqui para saber
                        mais</button></a>
            </div><!--CHARGAFF-->
        </div><!--CORPO MOBILE-->
    </div><!--CORPO-->
    <div class="corpo">
        <div class="postagem">
            <header>
                <h3> O que é o DNA e para quê ele serve?</h3>
            </header>
            <div class="oqedna">
                <p>O DNA é um ácido nucleico que tem a função de armazenar o material genético dentro de uma célula</p>
            </div>
            <div class="oqedna">

            </div>
        </div><!--Postagem-->
    </div><!--Corpo-->

    <div class="corpo">
        <div class="guia">
            <header class="titleguia">
                <h3>Como funciona a transcrição?</h3>
            </header>
            <div class="hr"></div>
        </div><!--Guia-->
    </div><!--Corpo-->
    <footer class="rodape" style="background-color: #262626;">
        Rodape
    </footer>
</body>

</html>