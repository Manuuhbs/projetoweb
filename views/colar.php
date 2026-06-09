<?php require_once __DIR__ . '/../controllers/Colar.controller.php';
$controller = new ColarController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['action']) && $_POST['action'] === 'salvar') {
    $controller->salvar();
  }
}
$colares = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Colar</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>

<body>
  <section class="parte-esquerda-colar">
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
      <?php foreach ($colares as $colar): ?>
        <tr>
          <td><?= $colar->getIdColar() ?></td>
          <td><?= $colar->getCdBarras() ?></td>
          <td><?= $colar->getDescricao() ?></td>
          <td><?= $colar->getPreco() ?></td>
          <td>
            <form action="deletaColar.php" method="POST"
              onsubmit="return confirm('Deseja realmente excluir o colar <?= $colar->getDescricao() ?>?')">
              <input type="hidden" name="idcolar" value="<?= $colar->getIdColar() ?>">
              <button type="submit" class="acoes"><span class="material-symbols-outlined">
                  delete
                </span>
              </button>
            </form>
          </td>
          <td>
            <a href="editaColar.php?idcolar=<?= $colar->getIdColar() ?>" class="acoes"><span
                class="material-symbols-outlined">
                edit
              </span>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
  <section class="parte-direita-colar">
  </section>
</body>

</html>