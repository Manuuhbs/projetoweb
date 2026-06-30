<?php require_once __DIR__ . '/../controllers/ClienteController.php';
$controller = new ClienteController();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'salvar') {
    if ($controller->salvar()) {
        header("Location: cliente.php");
    } else {
        echo "<script>alert('Os campos não podem ser vazios!');</script>";
    }
}
$clientes = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>

<body>
    <section class="parte-esquerda-cliente">
    </section>
    <main>
        <form method="post" action="" class="formulario-cliente">
            <div class="form-colunas">
                <div class="coluna-esquerda">
                    <input type="hidden" name="action" value="salvar">
                    <label>Nome<span class="asterisco" title="Campo obrigatório">*</span></label>
                    <input type="text" name="nome" maxlength="200" id="nome">
                    <label>Data de Nascimento<span class="asterisco" title="Campo obrigatório">*</span></label>
                    <input type="date" name="dt_nascimento" maxlength="10" placeholder="dd/mm/aaaa">
                    <label>CEP</label>
                    <input type="text" name="cep" maxlength="8" id="cep">
                    <label>Bairro<span class="asterisco" title="Campo obrigatório">*</span></label>
                    <input type="text" name="bairro" maxlength="200" id="bairro">
                    <label>Rua</label>
                    <input type="text" name="rua" maxlength="200" id="rua">
                </div>
                <div class="coluna-direita">
                    <label>Cidade</label>
                    <input type="text" name="cidade" maxlength="200" id="cidade">
                    <label>Numero</label>
                    <input type="text" name="numero" maxlength="8">
                    <label>Estado<span class="asterisco" title="Campo obrigatório">*</span></label>
                    <input type="text" name="estado" placeholder="AA" maxlength="2" id="estado">
                    <label>País<span class="asterisco" title="Campo obrigatório">*</span></label>
                    <input type="text" name="pais" maxlength="50" id="pais">
                    <label>Complemento<span class="asterisco" title="Campo obrigatório">*</span></label>
                    <input type="text" name="complemento" maxlength="50">
                </div>
            </div>
            <div class="botoes">
                <button type="button"><a href="index.php">Voltar</a></button>
                <button type="submit">Salvar</button>
            </div>
        </form>
        <table class="tabela">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CEP</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Cidade</th>
                <th>Numero</th>
                <th>Estado</th>
                <th>País</th>
                <th>Complemento</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente->getIdCliente() ?></td>
                    <td><?= $cliente->getNome() ?></td>
                    <td><?= $cliente->getDtNascimento() ?></td>
                    <td><?= $cliente->getCep() ?></td>
                    <td><?= $cliente->getBairro() ?></td>
                    <td><?= $cliente->getRua() ?></td>
                    <td><?= $cliente->getCidade() ?></td>
                    <td><?= $cliente->getNumero() ?></td>
                    <td><?= $cliente->getEstado() ?></td>
                    <td><?= $cliente->getPais() ?></td>
                    <td><?= $cliente->getComplemento() ?></td>

                    <td>
                        <form action="deletacliente.php" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir o cliente <?= $cliente->getCep() ?>?')">
                            <input type="hidden" name="idcliente" value="<?= $cliente->getIdcliente() ?>">
                            <button type="submit" class="acoes"><span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="editacliente.php?idcliente=<?= $cliente->getIdcliente() ?>" class="acoes"><span
                                class="material-symbols-outlined">
                                edit
                            </span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </main>
    <section class="parte-direita-cliente">
    </section>
    <script>
        document.getElementById("cep").addEventListener("blur", function () {
            let cep = this.value.replace(/\D/g, '');
            if (cep.length !== 8) {
                alert("CEP inválido, deve conter 8 caracteres");
                return;
            }
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(resposta => resposta.json())
                .then(dados => {
                    if (dados.erro) {
                        alert("CEP não encontrado, tente novamente");
                        return;
                    }
                    document.getElementById("rua").value = dados.logradouro;
                    document.getElementById("bairro").value = dados.bairro;
                    document.getElementById("cidade").value = dados.localidade;
                    document.getElementById("estado").value = dados.uf;
                })
                .catch(() => {
                    alert("Erro ao consultar o CEP");
                });

        });
    </script>
</body>

</html>