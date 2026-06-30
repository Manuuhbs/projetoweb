<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/ClienteModel.php';

class ClienteDao
{
    private $tabela = 'cliente';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Cliente $cliente)
    {
        $sql = "INSERT INTO $this->tabela (nome, dt_nascimento, cep, bairro, rua, cidade, numero, estado, pais, complemento ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $cliente->getNome(),
            $cliente->getDtNascimento(),
            $cliente->getCep(),
            $cliente->getBairro(),
            $cliente->getRua(),
            $cliente->getCidade(),
            $cliente->getNumero(),
            $cliente->getEstado(),
            $cliente->getPais(),
            $cliente->getComplemento()
        ]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM $this->tabela WHERE idcliente = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row)
            return null;

        return new Cliente(
            $row['nome'],
            $row['dt_nascimento'],
            $row['cep'],
            $row['bairro'],
            $row['rua'],
            $row['cidade'],
            $row['numero'],
            $row['estado'],
            $row['pais'],
            $row['complemento'],
            $row['idcliente']
        );
    }
    public function atualizar(Cliente $cliente)
    {
        $sql = "UPDATE $this->tabela SET nome = ?, dt_nascimento = ?, cep = ?, bairro = ?, rua = ?, cidade = ?, numero = ?, estado = ?, pais = ?, complemento = ? WHERE idcliente = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $cliente->getNome(),
            $cliente->getDtNascimento(),
            $cliente->getCep(),
            $cliente->getBairro(),
            $cliente->getRua(),
            $cliente->getCidade(),
            $cliente->getNumero(),
            $cliente->getEstado(),
            $cliente->getPais(),
            $cliente->getComplemento(),
            $cliente->getIdCliente()
        ]);
    }
    public function deletar($id)
    {
        $sql = "DELETE FROM $this->tabela WHERE idcliente = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
    public function listar()
    {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $clientes = [];

        foreach ($rows as $row) {

            $clientes[] = new Cliente(
                $row['nome'],
                $row['dt_nascimento'],
                $row['cep'],
                $row['bairro'],
                $row['rua'],
                $row['cidade'],
                $row['numero'],
                $row['estado'],
                $row['pais'],
                $row['complemento'],
                $row['idcliente']
            );
        }

        return $clientes;
    }
}
