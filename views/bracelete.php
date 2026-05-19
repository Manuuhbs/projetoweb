<?php require_once __DIR__ . '/../controllers/Bracelete.controller.php';
$controller = new BraceleteController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $controller->salvar();
}
$braceletes = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bracelete</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <section class="parte-esquerda-bracelete">
  </section>
  <main>
    <form method="post" action="" class="form">
      <label>Código de Barras</label>
      <input type="text" name="cdbarras" maxlength="13" required>
      <label>Descrição</label>
      <input type="text" name="descricao" required>
      <label>Preço</label>
      <input type="number" name="preco" step="0.01" required>
      <div class="botoes">
        <button type="submit">Salvar</button>
        <button><a href="index.php">Voltar</a></button>
      </div>
    </form>
    <table class="tabela">
      <tr>
        <th>ID</th>
        <th>Código de Barras</th>
        <th>Descrição</th>
        <th>Preço</th>
      </tr>
      <?php foreach ($braceletes as $bracelete): ?>
        <tr>
          <td><?= $bracelete->getIdBracelete() ?></td>
          <td><?= $bracelete->getCdBarras() ?></td>
          <td><?= $bracelete->getDescricao() ?></td>
          <td><?= $bracelete->getPreco() ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
  <section class="parte-direita-bracelete">
  </section>
</body>

</html>