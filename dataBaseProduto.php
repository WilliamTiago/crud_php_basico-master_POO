<?php

    class ProdutosDto{

        private $database;

        public function __construct($conecxao){
            $this->database = $conexao;
        }


        function listaProdutos() {
            $produtos = array();
            $query="    SELECT p.*,
                               c.nome as nomeCategoria 
                          FROM produto as p
                    INNER JOIN categoria as c 
                            ON c.categoria_id = p.categoria_id";
    
            $resultado = mysqli_query($this->database->getConexao(),$query);
            while($produto = mysqli_fetch_assoc($resultado)){
                 array_push($produtos, $produto);
            }
    
            return $produtos;
    
        }
    
        function alteraProduto($id, $nome, $preco, $descricao, $categoria_id){
            $query="update produto set nome ='" . $nome . "',preco=". $preco . ",descricao='" . $descricao . "',categoria_id=" . $categoria_id ." where id =" . $id;
            var_dump($query);
            return  mysqli_query($this->database->getConexao(),$query);
    
        }
    
        function listaCategorias(){
            $categorias = array();
            $query="    SELECT * 
                        FROM categoria";
            $resultado = mysqli_query($this->database->getConexao(),$query);
            while($categoria = mysqli_fetch_assoc($resultado)){
                array_push($categorias,$categoria);
            }
            return $categorias;
        }
    
        function buscaProduto($id){
            $query="SELECT p.*,
                           c.nome as nomeCategoria 
                      FROM produto as p
                INNER JOIN categoria as c 
                        ON c.categoria_id = p.categoria_id where id=".$id;
            $resultado = mysqli_query($this->database->getConexao(),$query);
            return mysqli_fetch_assoc($resultado);
    
        }
    
        function removeProdutos($id){
                $query="delete from produto where id=".$id;
                var_dump($query);
                return mysqli_query($this->database->getConexao(),$query);
                
        }
    
        function adicionaProduto($nome, $preco, $descricao, $categoria_id){
            $query="INSERT INTO produto (nome,preco,descricao,categoria_id) values ('$nome',$preco,'$descricao',$categoria_id)";
            return mysqli_query($this->database->getConexao(),$query);
        }
    }
    
    ?>