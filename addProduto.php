<?php 
    include_once("header.php");
    include_once("conect.php");
    include_once("dataBaseProduto.php");

    $conexao = new BancoDeDados("localhost","root","","loja");
    $produtosDto = new ProdutosDto($conexao);

    $nome      = $_POST['produto'];
    $preco     = $_POST['preco'],
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];    

    if(array_key_exists("usado",$_POST)){
        $usado = "true";
    }else{
        $usado = "false";
    }

    if($produtosDto->insereProduto($id, $nome,$preco,$descricao,$categoria,$usado)){
    ?>
        <p class="text-succes">O produto <?= $nome ?> foi adicionado com suceso!</p>   
    <?php 
    }else{
        $msg = mysqli_error($conexao->getConexao());
    ?>
        <p class="text-succes">Não foi possivel realizar esta operação! <?php $msg ?></p>    
    
<?php
    }
include_once("footer.php");