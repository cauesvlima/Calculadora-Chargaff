<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Importação de css personalizado-->
    <link rel="stylesheet" href="../mainmenu/css/estilo.css">
    <!--Importação bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <header id="cabecalho">
        <div class="divtitulo">
            <h1 id="titulo" class="principal">
                    Login
            </h1>
        </div><!--Div titulo-->
    </header><!--cabecalho-->
      <!--Offcanva-->
      
        <div class="corpo corpologin">
            <article class="calculadora inplogin corpologin">
                <form action="">
                    <div style="display: block; width: 50vw;">
                        <h3 class="h3login">Fazer login</h3>
                        <div class="hr" style="margin-bottom:3vh;"></div> <!--LINHA PARA QUEBRA-->
                        <div class="labelinp"><label for="loginuser" class="labelinp">Insira o login</label></div>
                        <div class="inplogin"><input type="text" name="loginuser" id="idloginuser" class="loginuser"></div>
                        <div class="labelinp"><label for="loginuser" class="labelinp">Insira a senha</label></div>
                        <div class="inplogin"><input type="text" name="senhauser" id="idloginuser" class="loginuser"></div>                        
                        <div class="inplogin"><input type="submit" name="enviar" value="Fazer login" class="submitlogin"></div>
                    </div><!--Display Block-->
                </form><!--Form-->
            </article><!--Article-->
        </div><!--CORPO LOGIN-->
    </form>
        
</body>

<?php 
if(isset($_POST['enviar'])){
    $loginuser = filter_input(INPUT_POST,'loginuser',FILTER_SANITIZE_SPECIAL_CHARS); //recebendo o login do input loginuser
    $senhauser = filter_input(INPUT_POST,'senhauser',FILTER_SANITIZE_SPECIAL_CHARS); //recebendo a senha do input senhauser

    try{
    include_once('../Classes/Usuario.class.php');
    $userlogin = new Usuario();

    //tratamento caso os campos estiverem vazios
    if(empty($loginuser) || empty($senhauser)){
        throw new Exception("Os dois campos devem estar preenchidos.");
    }else{//executar normalmente
    
    if($userlogin->iniciaLogon($loginuser,$senhauser)){
        header("Location: ../mainmenu/calculadora.php");
    }else{
       echo $msg = 'Usuário e/ou senha não conferem.';
    } 
}
}catch(Exception $e){
    echo $msg = $e->getMessage();
}
}


?>
</html>