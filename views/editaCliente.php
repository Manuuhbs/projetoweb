<?php
require_once __DIR__ . '/../controllers/ClienteController.php';
require_once __DIR__ . '/../config/console.php';
$controller = new ClienteController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    header("Location: cliente.php");
    exit;
}


$id = $_GET['idcliente'] ?? null;
console_log($id);
$cliente = $id ? $controller->buscarPorId($id) : null;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <form action="" method="POST" class="form-edita">
        <h2>Editar cliente</h2>
        <input type="hidden" name="idcliente" value="<?= htmlspecialchars($cliente->getIdcliente()) ?>">
        <label>Nome</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($cliente->getNome()) ?>" required>
        <br>
        <label>DtNascimento</label>
        <input type="text" name="dt_nascimento" value="<?= htmlspecialchars($cliente->getDtNascimento()) ?>" required>
        <br>
        <label>Cep</label>
        <input type="text" name="cep" value="<?= htmlspecialchars($cliente->getCep()) ?>" required>
        <br>
        <label>Bairro</label>
        <input type="text" name="bairro" value="<?= htmlspecialchars($cliente->getBairro()) ?>" required>
        <br>
        <label>Rua</label>
        <input type="text" name="rua" value="<?= htmlspecialchars($cliente->getRua()) ?>" required>
        <br>
        <label>Cidade</label>
        <input type="text" name="cidade" value="<?= htmlspecialchars($cliente->getCidade()) ?>" required>
        <br>
        <label>Numero</label>
        <input type="text" name="numero" value="<?= htmlspecialchars($cliente->getNumero()) ?>" required>
        <br>
        <label>Estado</label>
        <input type="text" name="estado" value="<?= htmlspecialchars($cliente->getEstado()) ?>" required>
        <br>
        <label>Pais</label>
        <input type="text" name="pais" value="<?= htmlspecialchars($cliente->getPais()) ?>" required maxlength="50">
        <br>
        <label>Complemento</label>
        <input type="text" name="complemento" value="<?= htmlspecialchars($cliente->getComplemento()) ?>" required>
        <div class="botoes-edita">
            <a href="cliente.php">Cancelar</a>
            <button type="submit">Salvar alterações</button>

        </div>
    </form>



</body>

</html>