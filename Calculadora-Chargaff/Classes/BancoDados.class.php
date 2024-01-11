<?php

class BancoDados{ 
    private $servidor;
    private $usuario;
    private $senha;
    private $banco;
    public $con;
    public $comando;

    public function Conecta(){ //conexao - pegando arquivos do .ini
        $conexao = parse_ini_file('config/cfg.ini');
        $this->servidor = $conexao['servidor'];
        $this->banco = $conexao['banco'];
        $this->usuario = $conexao['usuario'];
        $this->senha = $conexao['senha'];
        $this->con = @mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->banco);

        if(!$this->con){
            die ("Problemas com a conexão. Contate o admininstrador.");
        }else{
            mysqli_query($this->con,"SET NAMES 'utf8'");
            mysqli_query($this->con, 'SET character_set_connection=utf8');
            mysqli_query($this->con, 'SET character_set_client=utf8');
            mysqli_query($this->con, 'SET character_set_results=utf8');
        }
    
    }//end conecta

    public function FechaConexao(){
        mysqli_close($this->con);
        return;
    }//end close

    public function InsereDados($sqlinsere){
        try{
        $this->comando = $sqlinsere;
        $this->Conecta();
            
        $result = mysqli_query($this->con,$this->comando);
    
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }catch(Exception $e){
        return $e->getMessage();
    }
        $this->FechaConexao();
    }//end insere

    public function ConsultaDados($sqlconsulta){
        
        $this->comando = $sqlconsulta;
        $this->Conecta();
        $result = mysqli_query($this->con,$this->comando);
        

        if(mysqli_num_rows($result)){
            $list = mysqli_fetch_all($result);
            return $list;
        }else{
            return false;
        }
        $this->FechaConexao();
    }//end consulta
    /*

    public function ConsultaDados($sqlconsulta) {
        $this->comando = $sqlconsulta;
        $this->Conecta();
        $result = mysqli_query($this->con, $this->comando);
    
        if ($result === false) {
            // Houve um erro na consulta
            $error = mysqli_error($this->con);
            $this->FechaConexao();
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
        }
    
        $numRows = mysqli_num_rows($result);
    
        if ($numRows >= 0) {
            $list = mysqli_fetch_all($result);
            $this->FechaConexao();
            return $list;
        } else {
            // Num rows não funcionou corretamente
            $this->FechaConexao();
            throw new Exception("Ocorreu um erro inesperado. Contate o ADM!");
        }
    }*/

}//ligação com o banco para o login do usuário. 
//permitirá que o usuário salve suas sequências e compartilhe elas
//não irá ser apresentado juntamente com o TCC




?>