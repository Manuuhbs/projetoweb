<?php
require_once __DIR__ . '/../controllers/Bracelete.controller.php';
require_once __DIR__ . '/../config/console.php';
$controller = new BraceleteController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['action']) && $_POST['action'] === 'salvar') {
    $controller->salvar();
    header("Location: bracelete.php");
  }
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
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

</head>

<body>
  <section class="parte-esquerda-bracelete">
  </section>
  <main>
    <form method="post" action="" class="form">
      <input type="hidden" name="action" value="salvar">
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
        <th>Deletar</th>
        <th>Editar</th>
      </tr>
      <?php foreach ($braceletes as $bracelete): ?>
        <tr>
          <td><?= $bracelete->getIdBracelete() ?></td>
          <td><?= $bracelete->getCdBarras() ?></td>
          <td><?= $bracelete->getDescricao() ?></td>
          <td><?= $bracelete->getPreco() ?></td>
          <td>
            <form action="deletaBracelete.php" method="POST"
              onsubmit="return confirm('Deseja realmente excluir o bracelete <?= $bracelete->getDescricao() ?>?')">
              <input type="hidden" name="idbracelete" value="<?= $bracelete->getIdBracelete() ?>">
              <button type="submit" class="acoes"><span class="material-symbols-outlined">
                  delete
                </span>
              </button>
            </form>
          </td>
          <td>
            <a href="editaBracelete.php?idbracelete=<?= $bracelete->getIdBracelete() ?>" class="acoes"><span
                class="material-symbols-outlined">
                edit
              </span>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
  <section class="parte-direita-bracelete">
  </section>
</body>

</html>