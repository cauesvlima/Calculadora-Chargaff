<?php
class Proteinas{
    private $codom;
    private $nomeproteina;


    public function consultaProteinas(){
        include_once('BancoDados.class.php');

        $consulta = new BancoDados();

        $sql = "CALL p_consultaProteina()";
        $list = $consulta->ConsultaDados($sql);

        if($list){
            return $list;
        }else{
            return false;
        }
    }
}








?>