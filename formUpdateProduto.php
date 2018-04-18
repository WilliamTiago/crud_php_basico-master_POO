
<?php 
      include_once("header.php");
      include_once("conect.php");
      include_once("produtoCategoria.php");
      include_once("dataBaseProduto.php");

      $conexao = new BancoDeDados("localhost","root","","loja");
      $prodotosDto = new ProdutoDto($conexao);
      $categoriasDto = new CAtegoriaDto($conexao);

      $id = $_GET['id']);

      $produto = $produtosDto->buscaProduto($id);

      $categorias = $categoriasDto->listaCategorias($conexao->getConexao());

      $usado = $produto["usado"] ? "checked='checked'":"";
?>
<h1>Alterando Produto</h1>
<form action="UpdateProduto.php" method="Post">
  <input value="<?php print $produto['id']?>" name="id" type="hidden"></input>
  <div class="form-group">
    <label for="produto">Produto</label>
    <input type="text" class="form-control" id="produto" name="produto" value="<?php print $produto['nome']?>">
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php print $produto['descricao']?>">
  </div>
  <div class="form-group">
    <label for="preco">Preço</label>
    <input type="number" class="form-control" id="preco" name="preco" value="<?php print $produto['preco']?>">
  </div>
  <div class="form-group">
    <label for="categoria">Categoria</label>
    <select class="form-control form-control-sm" id="categoria" name="categoria">
      <?php
        $categorias = listaCategorias($conecxao);
        foreach($categorias as $categoria):
        $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
        $selecao = $essaEhACategoria ? "selectted='selected'": ""; 
      ?>
        <option <?php print $selecao?> value="<?php print $categoria['categoria_id']?>"><?php echo $categoria['nome']?></option>
        <?php
            endforeach;
        ?>
    </select>
  </div>
  <div class="form-group">
    <label for="usado"></label>
    <input type="checkbox" class="form-control" id="usado" <?php print($usado) ?>> name="usado" value="true">
  </div>
  <button type="submit" class="btn btn-primary">Alterar</button>
  <a href="listProduto.php" class="btn btn-primary">Cancelar</a>
  <button type="reset" class="btn btn-primary">Limpar</button>
</form>

<?php 
mysqli_close($conecxao);
include_once("footer.php"); 
?>

