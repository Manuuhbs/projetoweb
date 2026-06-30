<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <section class="parte-esquerda-feedback">
    </section>
    <main>

        <form id="formFeedback" class="form">
            <input type="hidden" name="action" value="salvar">
            <label>Nome do cliente</label>
            <input type="text" id="nome_cliente" name="nome_cliente" maxlength="13" required>
            <label>Dê sua opinião!</label>
            <input type="text" id="opiniao" name="opiniao" required>
            <div class="botoes">
                <button type="button"><a href="index.php">Voltar</a></button>
                <button type="submit">Salvar</button>
            </div>
        </form>
        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody id="lista-feedback"></tbody>
        </table>
        <script>
            function validaCampos() {
                let nome = document.getElementById("nome_cliente").value.trim();
                let opiniao = document.getElementById("opiniao").value.trim();
                if (nome == null || opiniao == null) {
                    alert("É necessário preencher todos os campos")
                    return false;
                }
                return true;
            }
            const URL = "https://6a28adb74e1e783349a5e158.mockapi.io/api/jogos/Feedback";
            async function listarFeedback() {
                try {
                    const resposta = await fetch(URL);
                    if (!resposta.ok) {
                        throw new Error("Erro ao buscar feedbacks");
                    }
                    const lista = await resposta.json();
                    const tabela = document.getElementById("lista-feedback");
                    tabela.innerHTML = "";
                    if (lista.length === 0) {
                        tabela.innerHTML = `<tr><td colspan="3">Nenhum feedback encontrado, tente novamente</td></tr>`;
                        return;
                    }

                    lista.forEach(item => {
                        tabela.innerHTML += `
                            <tr>
                                <td>${item.idFeedBack}</td>
                                <td>${item.NomeDoCliente}</td>
                                <td>${item.Feedback}</td>
                            </tr>
                        `;
                    });
                } catch (erro) {
                    console.error("Erro ao carregar feedbacks:", erro);
                }
            }
            async function salvarFeedback() {
                const feedback = {
                    NomeDoCliente: document.getElementById("nome_cliente").value,
                    Feedback: document.getElementById("opiniao").value
                };

                await fetch(URL, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(feedback)
                });
                document.getElementById("formFeedback").reset();
                await listarFeedback();
            }
            document.getElementById("formFeedback").addEventListener("submit", async function (e) {
                e.preventDefault();
                await salvarFeedback();
            });
            listarFeedback();

        </script>
    </main>
    <section class="parte-direita-feedback">
    </section>
</body>

</html>