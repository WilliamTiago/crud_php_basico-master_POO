<?php 
    include_once("header.php");
    include_once("conect.php");
    include_once("dataBaseProduto.php");
    
    $conexao = new BancoDeDados("localhost","root","","loja");
    $produtosDto = new ProdutosDto($conexao);

    $id = $_POST["id"];
    $produtosDto->removeProduto($id);

    header("Location : listProduto.php?removido=true");
    die();

?>