<?php
    include_once('../Classes/BancoDados.class.php');
    $nvconecta = new BancoDados();
    $nvconecta->Conecta();
    $nvconecta->FechaConexao();
    //funcionou

?>