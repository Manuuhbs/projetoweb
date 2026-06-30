<?php require_once __DIR__ . '/../controllers/ColarController.php';
$controller = new ColarController();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] && $_POST['action'] === 'salvar') {
  if ($controller->salvar()) {
    header("Location: colar.php");
  } else {
    echo "<script>alert('Os campos não podem ser vazios!');</script>";
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
      <label>Código de Barras <span class="asterisco" title="Campo obrigatório">*</span></label>
      <input type="text" name="cdbarras" maxlength="13">
      <label>Descrição<span class="asterisco" title="Campo obrigatório">*</span></label>
      <input type="text" name="descricao">
      <label>Preço<span class="asterisco" title="Campo obrigatório">*</span></label>
      <input type="number" name="preco" step="0.01">
      <div class="botoes">
        <button><a href="index.php">Voltar</a></button>
        <button type="submit">Salvar</button>
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