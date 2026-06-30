<?php
require_once __DIR__ . '/../controllers/ColarController.php';
require_once __DIR__ . '/../config/console.php';
$controller = new ColarController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    header("Location: colar.php");
    exit;
}


$id = $_GET['idcolar'] ?? null;
console_log($id);
$colar = $id ? $controller->buscarPorId($id) : null;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Colar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="" method="POST" class="form-edita">
        <h2>Editar colar</h2>
        <input type="hidden" name="idcolar" value="<?= htmlspecialchars($colar->getIdColar()) ?>">
        <label>Codigo de Barras</label>
        <input type="text" name="cdbarras" value="<?= htmlspecialchars($colar->getCdBarras()) ?>" required>
        <br>
        <label>Descricao</label>
        <input type="text" name="descricao" value="<?= htmlspecialchars($colar->getDescricao()) ?>" required>
        <br>
        <label>Preco</label>
        <input type="text" name="preco" value="<?= htmlspecialchars($colar->getPreco()) ?>" required>
        <div class="botoes-edita">
            <a href="colar.php">Cancelar</a>
            <button type="submit">Salvar alterações</button>
        </div>
    </form>
</body>

</html>