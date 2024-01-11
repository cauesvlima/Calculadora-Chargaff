<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>*ACESSO NEGADO*</title>
    <style>
        *{
            /*font-family: Arial, Helvetica, sans-serif;*/
            font-family: 'IBM Plex Mono', monospace;
        }
       div{
        display:flex ;
        justify-content: center;
       }
       h1{
        text-align: center;
        color: red;
       }
    </style>
</head>
<body>
<div>
    <p>
    <img src="./img/acesso-negado.png" alt="">
    </p>
    </div>
    <h1><strong>ACESSO NEGADO - CONTATE O ADMINISTRADOR!</strong></h1>
    <?php header("Refresh: 0; url=../logout.php"); ?>
</body>
</html>