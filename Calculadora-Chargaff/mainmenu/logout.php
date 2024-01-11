<?php
    session_start();
    $_SESSION = array(); //o array é gravado vazio para sobrepor a sessão criada no login, garantindo uma exclusão segura
    session_destroy(); //destruindo a sessão
    setcookie('navega',"",time()-3600);
    setcookie('idusuario','',time()-3600,'/');
    setcookie('loginusuario','',time()-3600,'/');
    echo 'Sessão encerrada com sucesso!';
    header("Refresh: 0 url=../mslrcrud/login.php");

?>