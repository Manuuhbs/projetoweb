<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/ColarModel.php';

class ColarDao
{
  private $tabela = 'colar';
  private $connection;

  public function __construct()
  {
    $db = new Database();
    $this->connection = $db->connection;
  }

  public function salvar(Colar $colar)
  {
    $sql = "INSERT INTO $this->tabela (cdbarras, descricao, preco) VALUES (?, ?, ?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $colar->getCdBarras(),
      $colar->getDescricao(),
      $colar->getPreco()
    ]);
  }

  public function buscarPorId($id)
  {
    $sql = "SELECT * FROM $this->tabela WHERE idcolar = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row)
      return null;

    return new Colar(
      $row['cdbarras'],
      $row['descricao'],
      $row['preco'],
      $row['idcolar']
    );
  }
  public function atualizar(Colar $colar)
  {
    $sql = "UPDATE $this->tabela SET cdbarras = ?, descricao = ?, preco = ? WHERE idcolar = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $colar->getCdBarras(),
      $colar->getDescricao(),
      $colar->getPreco(),
      $colar->getIdColar()
    ]);
  }
  public function deletar($id)
  {
    $sql = "DELETE FROM $this->tabela WHERE idcolar = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$id]);
  }
  public function listar()
  {
    $sql = "SELECT * FROM $this->tabela";
    $stmt = $this->connection->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $colares = [];

    foreach ($rows as $row) {

      $colares[] = new Colar(
        $row['cdbarras'],
        $row['descricao'],
        $row['preco'],
        $row['idcolar']
      );
    }

    return $colares;
  }
}
