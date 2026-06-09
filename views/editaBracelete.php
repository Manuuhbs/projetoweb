<?php
require_once __DIR__ . '/../controllers/Bracelete.controller.php';
require_once __DIR__ . '/../config/console.php';
$controller = new BraceleteController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    header("Location: bracelete.php");
    exit;
}


$id = $_GET['idbracelete'] ?? null;
console_log($id);
$bracelete = $id ? $controller->buscarPorId($id) : null;

if (!$bracelete) {
    console_log("gabreu");
    header("Location: bracelete.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Bracelete</title>
</head>

<body>

    <h2>Editar Bracelete</h2>

    <form action="" method="POST">

        <input type="hidden" name="idbracelete" value="<?= htmlspecialchars($bracelete->getIdBracelete()) ?>">

        <label>Codigo de Barras</label>
        <input type="text" name="cdbarras" value="<?= htmlspecialchars($bracelete->getCdBarras()) ?>" required>
        <br>

        <label>Descricao</label>
        <input type="text" name="descricao" value="<?= htmlspecialchars($bracelete->getDescricao()) ?>" required>
        <br>

        <label>Preco</label>
        <input type="text" name="preco" value="<?= htmlspecialchars($bracelete->getPreco()) ?>" required>
        <br>
        <button type="submit">Salvar alterações</button>
    </form>

    <a href="bracelete.php">Cancelar</a>

</body>

</html>