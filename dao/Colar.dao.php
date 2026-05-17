<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Colar.model.php';

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
