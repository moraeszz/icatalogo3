<?php
session_start();

//verificar se o usuario não esta logado 
if (!isset($_SESSION["usuarioId"])) {
  //declara e coloca erro nas mensagens da session 
 $_SESSION["mensagens"] ="Acesso negado, voce precis logar.";
//redirecionar  para listagen de produtos
 header("location: ../index.php");

}

require("../../database/conexao.php");

$sql = " SELECT * FROM tbl_categoria ";

$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles-global.css" />
  <link rel="stylesheet" href="./novo.css" />
  <title>Administrar Produtos</title>
</head>

<body>
<?php
  include("../../componentes/header/header.php");
?>
  <header>
    <input type="search" placeholder="Pesquisar" />
  </header>
  <div class="content">
    <section class="produtos-container">
      <main>
        <form class="form-produto" method="POST" action="taskActions.php">
        <input type="hidden" name="acao" value="inserir" />
          <h1>Cadastro de produto</h1>
          <ul>
           <li> Isso é um erro</li>
           <li> Isso é outro erro</li>
           <li>Isso é mais um erro</li>
          </ul>
          <div class="input-group span2">
            <label for="descricao">Descrição</label>
            <input name="descricao" type="text" id="descricao" required>
          </div>
          <div class="input-group">
            <label for="peso">Peso</label>
            <input name="peso" type="text" id="peso" required>
          </div>
          <div class="input-group">
            <label for="quantidade">Quantidade</label>
            <input name="quantidade" type="text" id="quantidade" required>
          </div>
          <div class="input-group">
            <label for="cor">Cor</label>
            <input name="cor" type="text" id="cor" required>
          </div>
          <div class="input-group">
            <label for="tamanho">Tamanho</label>
            <input name="tamanho" type="text" id="tamanho">
          </div>
          <div class="input-group">
            <label for="valor">Valor</label>
            <input name="valor" type="text" id="valor" required>
          </div>
          <div class="input-group">
            <label for="desconto">Desconto</label>
            <input name="desconto" type="text" id="desconto">
          </div>
          <div class="input-group">
            <label for="categoria">Categoria</label>
            <select type="text" name="categoria" id="categoria">
              <option value="">Selecione</option>
              <?php
              while($categoria = mysqli_fetch_array($resultado)) {
              ?>
              <option value="<?= $categoria["id"] ?>">
               <?= $categoria["descricao"] ?>
              </option>
               <?php
              }
              ?>
            </select>
          </div>
          <div class="input-group">
          <label for="foto">Foto</label>
          <input type="file" name="foto" id="foto" accept="image/*">
          </div>
          <button onclick="javascript:window.location.href = '../'">Cancelar</button>
          <button>Salvar</button>
        </form>
      </main>
    </section>
  </div>
  <footer>
    SENAI 2021 - Todos os direitos reservados
  </footer>
</body>

</html>
© 2021 GitHub, Inc.