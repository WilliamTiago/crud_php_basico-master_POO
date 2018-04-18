<?php 

class BancoDeDados{
    private $conn;
    public function __construct($host,$usuario,$senha,$base){
        $this->conn = mysqli_connect($host,$usuario,$senha,$base);
    }

    public function getConexao(){
        return $this->conn;
    }
} 

//$obj = new BancoDeDados("localhost", "root", "", "loja");

