<?php require_once __DIR__ . '/../controllers/Bracelete.controller.php';
$controller = new BraceleteController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $controller->salvar();
}
$braceletes = $controller->listar();
?>

<title>Bracelete</title>
</head>

<body>
  <form method="post" action="">
    <label>Código de Barras</label>
    <input type="text" name="cdbarras" maxlength="13" required>
    <label>Descrição</label>
    <input type="text" name="descricao" required>
    <label>Preço</label>
    <input type="number" name="preco" step="0.01" required>
    <button type="submit">Salvar</button>
    <a href="index.php">Voltar</a>
  </form>
  <table>
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
</body>