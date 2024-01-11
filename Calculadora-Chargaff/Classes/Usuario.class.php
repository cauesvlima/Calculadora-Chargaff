<?php

class Usuario{
    private $iduser;
    private $loginuser;
    private $senhauser;


    public function IniciaObj($loginuser,$senhauser){ //inicia um objeto pegando os valores informados
        $this->loginuser = $loginuser;
        $this->senhauser = $senhauser;

    }//end inicia

    public function MostraObj(){
        echo $this->loginuser.'</br>';
        echo $this->senhauser.'</br>';
    }//end mostra

    public function existeUser($loginuser){ //verifica se um nome de login já existe

        try{
        include_once('BancoDados.class.php');
        $consultalogin = new BancoDados();

        $sql = "CALL p_consExisteUser('$loginuser')";

        //tratamento se $sql == false
        if(empty($sql)){
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

        }else{

        $list = $consultalogin->ConsultaDados($sql);
        if($list){
            return true;
        }else{
            return false;
        }
    }
    }catch(Exception $e){
        return $e->getMessage();
    }
    }//end existe

    public function insereUser(){ //insere o usuário

        try{
        include_once('BancoDados.class.php');
        $novouser = new BancoDados();

        if(!$this->existeUser($this->loginuser)){
            $sql = "CALL p_insereUser('$this->loginuser','$this->senhauser')";

            //tratamento se $sql == null
            if(empty($sql)){
                throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
            }
            $retorno = $novouser->InsereDados($sql);

            if($retorno){
                $msg = "Registro gravado com sucesso!";
            }else{
                $msg = "OPS! Algo deu errado ao gravar seu registro. Contate o ADM.";
            }
        }else{
            $msg = "Usuário já cadastrado!";
        }
        return $msg;
    }catch(Exception $e){
        return $e->getMessage();
    }
    }//end insere



    public function consultaLogaUsuario(){  //consulta se login e senha estão corretos
     try{
        include_once('BancoDados.class.php');
        $logauser = new BancoDados();
        $sql = "CALL p_consultaLogaUsuario('$this->loginuser','$this->senhauser')";

        //tratamento se $sql == null
        if(empty($sql)){
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");

        }else{
        if($retorno = $logauser->ConsultaDados($sql)){
            foreach($retorno as $usuario){
                $this->loginuser = $usuario[1];
            }
            if(trim($usuario[1]) === trim($this->loginuser) && trim($usuario[2]) === trim($this->senhauser)){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
    }catch(Exception $e){
        return $e->getMessage();
    }
    }//end consulta

    public function consultaId($loginuser){ //consulta o ID do usuário que está logado, para assim salvar as sequências
        include_once('BancoDados.class.php');
        $consultaid = new BancoDados();

        try{
        $sql = "CALL p_consultaId('$loginuser')";

        //tratamento caso $sql == null
        if(empty($sql)){
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
        }else{
        $list = $consultaid->ConsultaDados($sql);
        if($list){
            return $list;
        }else{
            return false;
        }
    }
    
    }catch(Exception $e){
        return $e->getMessage();
    }
    }

    public function iniciaLogon($loginus,$senhaus){ //iniciar logon
        $this->loginuser = $loginus;
        $this->senhauser = $senhaus;
        //$this->iduser = $iduser;
       // $this->consultaLogaUsuario();

      try{
        if($this->consultaLogaUsuario()){
         
            $id = $this->loginuser;
            session_id($id); //Esse ID é usado para identificar o usuário e suas informações associadas em visitas futuras.
            session_start();
            $nomecookie = "navega";
            $origem = 'login';
            $_SESSION['nameck'] = $nomecookie;
            $_SESSION['origem'] = $origem;
            $_SESSION['status'] = 'logado';
            $_SESSION['loginuser'] = $this->loginuser;
            setcookie("miguel",$id);
            return true;

        }else{
            return false;
        } 
    }catch(Exception $e){
        return $e->getMessage();
    }
    }//end inicia logon

}

?>