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
