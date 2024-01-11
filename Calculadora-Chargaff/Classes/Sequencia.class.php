<?php
class Sequencia{

    private $idsequencia;
    private $sequencia;
    private $tiposequencia;
    private $iduser;

    
 public function IniciaSequencia($sequencia,$tiposequencia,$iduser){ //inicia um objeto pegando os valores informados
     $this->sequencia = $sequencia;
     $this->tiposequencia = $tiposequencia;
     $this->iduser = $iduser;

    }//end inicia

    public function MostraObj(){
        echo $this->sequencia.'</br>';
        echo $this->tiposequencia.'</br>';
        echo $this->iduser.'</br>';
    }//end mostra


    public function insereSequencia($sequencia,$tiposequencia,$iduser){
        try{
            
        include_once('BancoDados.class.php');
        $inseresequencia = new BancoDados();

        $sql = "CALL p_insereSequencia('$sequencia','$tiposequencia','$iduser')";

        //tratamento caso $sql for null
        if(empty($sql)){
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
        }else{
        $retorno = $inseresequencia->InsereDados($sql);

        if($retorno){
            $msg = "";
        }else{
            $msg = "OPS! Algo deu errado ao salvar sua sequência.";
        }
        return $msg;
    }
    }catch(Exception $e){
        return $msg = $e->getMessage();
    }

        //a sequencia é salva usando respectivamente a sequencia digitada, o tipo
        //(DNA, RNA t ou RNA m) e o ID do usuário, para quando o usuário desejar
        //editar ou excluir sua sequência.

    }//end sequencia 

    public function exibeSequencia($iduser){
        try{
        include_once('BancoDados.class.php');
        $exibesequencia = new BancoDados();

        $sql = "CALL p_consultaSequencia('$iduser')";

        //tratamento caso $sql for null
        if(empty($sql)){
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
        }else{
        $list = $exibesequencia->ConsultaDados($sql);

        if($list){
            return $list;
        }else{
            return false;
        }
    }
    }catch(Exception $e){
        return $e->getMessage();
    }

        //utilizando o ID do usuário, trará todas as sequências de respectivo usuário.
    }//end exibe

    public function deletaSequencia($idsequencia){
        include_once('BancoDados.class.php');
        $deletasequencia = new BancoDados ();
        $sql = "CALL p_excluiSequencia('$idsequencia')";
        $retorno = $deletasequencia->InsereDados($sql);
        if($retorno){
            return "Exclusão efetuada com sucesso!";
        }else{
            return "OPS! Algo deu errado para excluir esse registro!";
        }
    }//end deleta

    public function consultaSequenciaId($id){
        include_once('BancoDados.class.php');
        $consulta = new BancoDados();

        try{
        
        $sql = "CALL p_consultaSequenciaId('$id')";

        //tratamento se $sql ==  null
        if(empty($sql)){
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
        }else{

        $list = $consulta->ConsultaDados($sql);

        if($list){
            return $list;
        }else{
            return false;
        }
    }
    }catch(Exception $e){
        return $e->getMessage();
    }
    }//end consultasequenciaid

    public function editaSequencia($idsequencia,$sequencia, $tiposequencia){ //funcao q edita a sequencia desejada
        try{
        
        include_once('BancoDados.class.php');
        $novasequencia = new BancoDados();

        $sql = "CALL p_editaSequencia('$idsequencia','$sequencia','$tiposequencia')";

        //tratamento se $sql for null
        if(empty($sql)){
            throw new Exception("Ocorreu umerro inesperado. Contate o ADM!");
        }else{
        $retorno = $novasequencia->InsereDados($sql);
        if($retorno){
            return "Sequência alterada com sucesso!";
        }else{
            return "OPS! ALGO DEU ERRADO AO GRAVAR SEU REGISTRO!!";
        }
    }
    }catch(Exception $e){
        return $e->getMessage();
    }
    }//end edita

}

?>