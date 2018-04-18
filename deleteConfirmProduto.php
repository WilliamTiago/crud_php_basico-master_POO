<?php 
    include_once("header.php");
    include_once("conect.php");
    include_once("dataBaseProduto.php");

    $conexao = new BancoDeDados("localhost","root","","loja");
    $produtosDto = new ProdutosDto($conexao);

    $id = $_POST["id"]; 

    $produto = $produtoDto->buscaProduto($id);

?>

Você deseja realmente excluir o produto listado abaixo?
<br>
<br>
<form action="produto-delete.php" method="post">
<input type="hidden" name="id" value="<?php print $produto["id"]?>"/ >
Nome: <?php print $produto["nome"]?>
Preço: <?php print $produto["preco"]?>
Descrição: <?php print $produto["descricao"]?>
Categoria: <?php print $produto["categoria_nome"]?>
Usado: <?php print $produto["usado"]?>

<input type="submit" name="comfirma" value="Comfirmar"/ >
</form>

<?php include_once("footerr.php"); ?>
    