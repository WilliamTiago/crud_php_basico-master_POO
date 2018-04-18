<?php include_once("header.php");
      include_once("conect.php");
      include_once("categoriaBanco.php");

      $conexao = new BancoDeDados("localhost","root","","loja");
      $categoriaDto =  new CategoriaDto($conexao);
      $categorias = $categoriasDto->listaCategorias($conexao);
?>

<h1>Formulário de Cadastro</h1>
<form action="addProduto.php" method="Post">
  <div class="form-group">
    <label for="nome">Produto</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="">
  </div>
  <div class="form-group">
    <label for="preco">Preço</label>
    <input type="number" class="form-control" id="preco" name="preco">
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
  </div>  
  <div class="form-group">
    <label for="categoria">Categoria</label>
    <select class="form-control form-control-sm" id="categoria" name="categoria">
      <?php foreach($categorias as $categoria): ?>
        <option value="<?php print $categoria['categoria_id']?>"><?php echo $categoria['nome']?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<?php  
?>

