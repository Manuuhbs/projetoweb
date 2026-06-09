<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Bracelete.model.php';

class BraceleteDao
{
  private $tabela = 'bracelete';
  private $connection;

  public function __construct()
  {
    $db = new Database();
    $this->connection = $db->connection;
  }

  public function salvar(Bracelete $bracelete)
  {
    $sql = "INSERT INTO $this->tabela (cdbarras, descricao, preco) VALUES (?, ?, ?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $bracelete->getCdBarras(),
      $bracelete->getDescricao(),
      $bracelete->getPreco()
    ]);
  }

  public function buscarPorId($id)
  {
    $sql = "SELECT * FROM $this->tabela WHERE idbracelete = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row)
      return null;

    return new Bracelete(
      $row['cdbarras'],
      $row['descricao'],
      $row['preco'],
      $row['idbracelete']
    );
  }
  public function atualizar(Bracelete $bracelete)
  {
    $sql = "UPDATE $this->tabela SET cdbarras = ?, descricao = ?, preco = ? WHERE idbracelete = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $bracelete->getCdBarras(),
      $bracelete->getDescricao(),
      $bracelete->getPreco(),
      $bracelete->getIdBracelete()
    ]);
  }
  public function deletar($id)
  {
    $sql = "DELETE FROM $this->tabela WHERE idbracelete = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$id]);
  }
  public function listar()
  {
    $sql = "SELECT * FROM $this->tabela";
    $stmt = $this->connection->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $braceletes = [];

    foreach ($rows as $row) {

      $braceletes[] = new Bracelete(
        $row['cdbarras'],
        $row['descricao'],
        $row['preco'],
        $row['idbracelete']
      );
    }

    return $braceletes;
  }
}
