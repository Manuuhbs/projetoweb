<?php require_once __DIR__ . '/../controllers/Colar.controller.php';
$controller = new ColarController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $controller->salvar();
}
$colares = $controller->listar();
?>

<title>Colar</title>
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
    <?php foreach ($colares as $colar): ?>
      <tr>
        <td><?= $colar->getIdColar() ?></td>
        <td><?= $colar->getCdBarras() ?></td>
        <td><?= $colar->getDescricao() ?></td>
        <td><?= $colar->getPreco() ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>